{{-- <div>
    <form wire:submit.prevent="addComment">
        <textarea wire:model="body"></textarea>
        @error('body') <span>{{ $message }}</span> @enderror
        <button type="submit">Add Comment</button>
    </form>

    @foreach ($comments as $comment)
        <div>
            <p>{{ $comment->body }}</p>
            <button wire:click="editComment({{ $comment->id }})">Edit</button>
            <button wire:click="deleteComment({{ $comment->id }})">Delete</button>
            @if ($editingCommentId === $comment->id)
                <form wire:submit.prevent="updateComment({{ $comment->id }})">
                    <textarea wire:model="body"></textarea>
                    @error('body') <span>{{ $message }}</span> @enderror
                    <button type="submit">Update Comment</button>
                </form>
            @endif
            @if ($replyToCommentId === $comment->id)
            <form wire:submit.prevent="addComment">
                <textarea wire:model="body"></textarea>
                @error('body') <span>{{ $message }}</span> @enderror
                <button type="submit">Reply</button>
                <button wire:click.prevent="cancelReply">Cancel</button>
            </form>
        @else

            <button wire:click="replyTo({{ $comment->id }})">Reply</button>
        @endif
            @foreach ($comment->replies as $reply)
            <div style="margin-left: 20px;">
                <p>{{ $reply->body }}</p>
                <p>Reply by: {{ $reply->user->name }}</p>
                <!-- ... existing code ... -->
            </div>
        @endforeach
        </div>
    @endforeach

</div>
 --}}
 <!-- resources/views/livewire/comment-component.blade.php -->
<!-- resources/views/livewire/comment-component.blade.php -->

<div>
    <button wire:click="toggleCommentForm">Add Comment</button>

    @if ($showCommentForm)
        <form wire:submit.prevent="addComment">
            <textarea wire:model="body"></textarea>
            @error('body') <span>{{ $message }}</span> @enderror
            <div>
                <button type="submit">Add Comment</button>
                <button wire:click.prevent="cancelComment">Cancel</button>
            </div>
        </form>
    @endif
    <button wire:click="toggleComments">Comments ({{ $comments->count() }})</button>
@if($showComments)
    @foreach ($comments as $comment)

        <div  style="margin-left: 20px; border-left: 2px solid #ccc; padding-left: 10px;">

            <p>{{ $comment->body }}</p>

            <p>Commented By : {{ $comment->user->name}}</p>
            <div>
                <button wire:click="toggleShowReplies({{ $comment->id }})">Show replies ({{ $comment->replies->count() }})</button>

                <button wire:click="replyTo({{ $comment->id }})">Reply</button>
                <button wire:click="editComment({{ $comment->id }})">Edit</button>
                <button wire:click="deleteComment({{ $comment->id }})">Delete</button>
            </div>

            @if ($editingCommentId === $comment->id)
                <form wire:submit.prevent="updateComment({{ $comment->id }})">
                    <textarea wire:model="body"></textarea>
                    @error('body') <span>{{ $message }}</span> @enderror
                    <button type="submit">Update Comment</button>
                </form>
            @endif

            @if ($replyToCommentId === $comment->id)
                <form wire:submit.prevent="addComment">
                    <textarea wire:model="body"></textarea>
                    @error('body') <span>{{ $message }}</span> @enderror
                    <div>
                        <button type="submit">Reply</button>
                        <button wire:click.prevent="cancelReply">Cancel</button>
                    </div>
                </form>
            @endif

            @if ($showReplies && $commentId ===  $comment->id)
               @foreach ($comment->replies as $reply)

                <div style="margin-left: 20px; border-left: 2px solid #ccc; padding-left: 10px;">
                    <p>{{ $reply->body }}</p>
                    <div>
                        <button wire:click="replyTo({{ $reply->id }})">Reply</button>

                        <button wire:click="editComment({{ $reply->id }})">Edit</button>
                        <button wire:click="deleteComment({{ $reply->id }})">Delete</button>
                    </div>
                    @if ($editingCommentId === $reply->id)
                    <form wire:submit.prevent="updateComment({{ $reply->id }})">
                        <textarea wire:model="body"></textarea>
                        @error('body') <span>{{ $message }}</span> @enderror
                        <button type="submit">Update Comment</button>

                    </form>
                @endif
                    @if ($replyToCommentId === $reply->id)
                        <form wire:submit.prevent="addComment">
                            <textarea wire:model="body"></textarea>
                            @error('body') <span>{{ $message }}</span> @enderror
                            <div>
                                <button type="submit">Reply</button>
                                <button wire:click.prevent="cancelReply">Cancel</button>
                            </div>
                        </form>
                    @endif
                </div>
                {{-- @foreach ($reply->replies as $re )
           <div style="margin-left: 40px; border-left: 2px solid #ccc; padding-left: 30px;">
             <p>{{ $re->body }}</p>
             <div>
                 <button wire:click="replyTo({{ $re->id }})">Reply</button>

                 <button wire:click="editComment({{ $re->id }})">Edit</button>
                 <button wire:click="deleteComment({{ $re->id }})">Delete</button>
             </div>
             @if ($editingCommentId === $re->id)
             <form wire:submit.prevent="updateComment({{ $re->id }})">
                 <textarea wire:model="body"></textarea>
                 @error('body') <span>{{ $message }}</span> @enderror
                 <button type="submit">Update Comment</button>

             </form>
         @endif
             @if ($replyToCommentId === $re->id)
                 <form wire:submit.prevent="addComment">
                     <textarea wire:model="body"></textarea>
                     @error('body') <span>{{ $message }}</span> @enderror
                     <div>
                         <button type="submit">Reply</button>
                         <button wire:click.prevent="cancelReply">Cancel</button>
                     </div>
                 </form>
             @endif
         </div>
           @endforeach --}}
       @endforeach


           @endif

        </div>
    @endforeach
    @endif

</div>

