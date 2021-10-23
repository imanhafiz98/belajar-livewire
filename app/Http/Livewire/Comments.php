<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Comments extends Component
{
    public $comments = [
        [
            'body' => 'adasdsad sdasdasdasd asdasdasdasdasd.',
            'created_at' => '3 min ago',
            'creator' => 'Iman'
        ]

    ];

    public $newComment;

    public function addComment()
    {
        if($this->newComment == ''){

            return;

        }

        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Hafiz'
        ]);

        $this->newComment = "";
        
        // $this->comments[] = [

        //     'body' => 'Hello World.',
        //     'created_at' => '1 min ago',
        //     'creator' => 'Hafiz'

        // ];
    }

    public function mount()
    {
        $this->newComment = 'I am from mounted function';
    }

    public function render()
    {
        return view('livewire.comments');
    }

}
