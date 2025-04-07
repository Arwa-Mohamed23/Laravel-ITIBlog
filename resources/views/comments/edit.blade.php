<x-layout>
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-md border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-base font-medium text-gray-700">Edit Comment</h2>
            </div>
            <div class="px-6 py-4">
                <form method="POST" action="{{ route('comments.update', ['post' => $post->id, 'comment' => $comment->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Comment</label>
                        <textarea name="content" id="content" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" required>{{ $comment->content }}</textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Comment Creator</label>
                        <select id="user_id" name="user_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 bg-white">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $comment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex justify-between">
                        <a href="{{ route('posts.show', $post->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>