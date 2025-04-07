<x-layout>
    <div class="max-w-3xl mx-auto">
        <!-- Post Info Section -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Post Info</h2>
                </div>
                <div class="px-6 py-4">
                    <div class="mb-4">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <span class="font-medium text-gray-700 md:w-28">Title :-</span>
                            <span class="text-gray-800">{{ $post['title'] }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col md:flex-row md:items-start">
                            <span class="font-medium text-gray-700 md:w-28">Description :-</span>
                            <span class="text-gray-800">{{ $post['description'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Post Creator Info Section -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Post Creator Info</h2>
                </div>
                <div class="px-6 py-4">
                    <div class="mb-3">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <span class="font-medium text-gray-700 md:w-28">Name :-</span>
                            <span class="text-gray-800">{{$post->user ? $post->user->name : 'not found'}}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <span class="font-medium text-gray-700 md:w-28">Email :-</span>
                            <span class="text-gray-800">{{ $post['user']? $post['user']['email']: 'not found' }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col md:flex-row md:items-center">
                            <span class="font-medium text-gray-700 md:w-28">Created At :-</span>
                            <span class="text-gray-800">{{ $post['user']? $post->user->created_at->format('l jS \\of F Y h:i:s A'): 'not Found' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Back to All Posts Button -->
        <div class="flex justify-end mb-8">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md text-sm font-medium transition-colors duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to All Posts
            </a>
        </div>

        <!-- Comments Section -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 mb-8">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Comments</h2>
            </div>
            
            <div class="divide-y divide-gray-100">
                @if($post->comments->count() > 0)
                    @foreach($post->comments as $comment)
                        <div class="p-5 hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex justify-between">
                                <div class="flex space-x-3">
                                    <div class="flex-shrink-0">
                                        <svg class="h-10 w-10 rounded-full bg-gray-100 text-gray-400 p-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center text-sm">
                                            <p class="font-medium text-gray-900 truncate">
                                                {{ $comment->user ? $comment->user->name : 'Unknown' }}
                                            </p>
                                            <span class="ml-2 text-gray-500">
                                                {{ $comment->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-800 mt-1">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('comments.edit', ['post' => $post->id, 'comment' => $comment->id]) }}" 
                                       class="text-blue-500 hover:text-blue-700 text-sm flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    
                                    <form method="POST" action="{{ route('comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}" 
                                          onsubmit="return confirm('Are you sure you want to delete this comment?');" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No comments yet</h3>
                        <p class="mt-1 text-sm text-gray-500">Be the first to share what you think!</p>
                    </div>
                @endif
            </div>
            
            <!-- Comment Form -->
            <div class="px-6 py-5 bg-gray-50 border-t border-gray-200">
                <h3 class="text-base font-medium text-gray-800 mb-4">Leave a comment</h3>
                <form method="POST" action="{{ route('comments.store', $post->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="sr-only">Comment</label>
                        <textarea name="content" id="content" rows="3" 
                                  class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-3 border" 
                                  placeholder="Write your thoughts here..."></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Comment as</label>
                        <select id="user_id" name="user_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 bg-white shadow-sm">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>