<x-layout>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Blog Posts</h2>
            <a href="{{ route('posts.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200 flex items-center">
                <i  class="fas fa-plus mr-2"></i> Create Post
            </a>
        </div>
            
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posted By</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
            </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post['id'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">{{ $post['title'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{$post->user ? $post->user->name : 'not found'}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $post->created_at->format('y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('posts.show', $post['id']) }}" >
                                        <x-button type="primary">View</x-button>
                                    </a>
                                    <a href="{{ route('posts.edit', $post['id']) }}"> 
                                        <x-button  type="secondary">Edit</x-button>
                                    </a>
                                    <form method="POST" 
                                          action="{{ route('posts.destroy', $post['id']) }}" 
                                          style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <x-button type="danger">Delete</x-button>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>

</x-layout>