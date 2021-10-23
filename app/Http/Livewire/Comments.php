<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comment;

class Comments extends Component
{
    public $comments;
    // public $comments = [
    //     [
    //         'body' => 'adasdsad sdasdasdasd asdasdasdasdasd.',
    //         'created_at' => '3 min ago',
    //         'creator' => 'Iman'
    //     ]

    // ];

    public $newComment;

    public function addComment()
    {
        if($this->newComment == ''){

            return;

        }

        $createdComment = Comment::create([

            'body' => $this->newComment, 
            'user_id'=>1

        ]);

        $this->comments->prepend($createdComment);

        $this->newComment = "";
        
        // $this->comments[] = [

        //     'body' => 'Hello World.',
        //     'created_at' => '1 min ago',
        //     'creator' => 'Hafiz'

        // ];
    }

    public function mount()
    {
        //dd($initialComments);

        $initialComments = Comment::latest()->get();
        $this->comments = $initialComments;

    }

    public function render()
    {
        return view('livewire.comments');
    }

}
