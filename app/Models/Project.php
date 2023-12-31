<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    const TYPE_FIXED = 'fixed';
    const TYPE_HOURLY = 'hourly';

    //protected $guarded = [];
    protected $fillable = [
        'title', 'category_id', 'user_id', 'description', 'budget',
        'status', 'type', 'attachments',
    ];

    protected $casts = [
        'budget' => 'float',
        'attachments' => 'json',
    ];

    // this's array contains of column that don't show in response when convert the mode to json object
    protected $hidden = [
        'updated_at',
    ];

    // I put inside this array the attributes that identifier as accessor method and return with data in response
    protected $appends = [
        'type_name',
    ];

    protected static function booted()
    {
        // Global scope will executed automatic on project
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', '=', 'open');
        });
    }

    public function scopeFilter(Builder $builder, $filters = [])
    {
        // array_merge between the new values and old values and make override on values
        $filters = array_merge([
            'type' => null,
            'status' => null,
            'budget_min' => null,
            'budget_max' => null,
        ], $filters);

        if ($filters['type']) {
            $builder->where('type', '=', $filters['type']);
        }

        // here $value represent the value of $filters['type']
        $builder->when($filters['status'], function ($builder, $value) {
            $builder->where('status', '=', $value);
        });

        $builder->when($filters['budget_min'], function ($builder, $value) {
            $builder->where('budget', '>=', $value);
        });

        $builder->when($filters['budget_max'], function ($builder, $value) {
            $builder->where('budget', '<=', $value);
        });
    }

    // here always the scope passed to it instance of Builder.
    public function scopeHigh(Builder $builder)
    {
        $builder->orderBy('budget', 'DESC');
    }

    public function scopeClosed(Builder $builder)
    {
        $builder->where('status', 'closed');
    }

    public function scopeHourly(Builder $builder)
    {
        $builder->where('type', 'hourly');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,     // Realted model
            'project_tag',  // Pivot table
            'project_id',   // F.K. for current model in pivot table
            'tag_id',       // F.K. for related model in pivot table
            'id',           // current model key (p.k.)
            'id'            // related model key (p.k. realted model)
        );
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function propsedFreelancers()
    {
        return $this->belongsToMany(
            User::class,
            'proposals',
            'project_id',
            'freelancer_id',
        )->withPivot([
            'description', 'cost', 'duration', 'duration_unit', 'status',
        ]);
    }

    public function contractedFreelancers()
    {
        return $this->belongsToMany(
            User::class,
            'contracts',
            'project_id',
            'freelancer_id',
        )->withPivot([
            'proposal_id', 'cost',
            'type', 'start_on', 'end_on', 'completed_on', 'hours', 'status'
        ]);
    }

    // $project->type_name
    public function getTypeNameAttribute()
    {
        // ucfirst() this make the first letter be capital
        return ucfirst($this->type);
    }

    public static function types()
    {
        return [
            self::TYPE_FIXED => 'Fixed',
            self::TYPE_HOURLY => 'Hourly',
        ];
    }

    public function syncTags(array $tags)
    {
        $tags_id = [];
        foreach ($tags as $tag_name) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug($tag_name),
            ], [
                'name' => trim($tag_name),
            ]);
            $tags_id[] = $tag->id;
        }
        $this->tags()->sync($tags_id);
    }
}
