<x-layout>
        <div class="max-w-3xl mx-auto">
            <!-- Post Info Section -->
            <div class="mb-6">
                <div class="bg-white rounded-md border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h2 class="text-base font-medium text-gray-700">Post Info</h2>
                    </div>
                    <div class="px-6 py-4">
                        <div class="mb-4">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <span class="font-medium text-gray-700 md:w-28">Title :-</span>
                                <span class="text-gray-600">{{ $post['title'] }}</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col md:flex-row md:items-start">
                                <span class="font-medium text-gray-700 md:w-28">Description :-</span>
                                <span class="text-gray-600">{{ $post['description'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Post Creator Info Section -->
            <div class="mb-6">
                <div class="bg-white rounded-md border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h2 class="text-base font-medium text-gray-700">Post Creator Info</h2>
                    </div>
                    <div class="px-6 py-4">
                        <div class="mb-3">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <span class="font-medium text-gray-700 md:w-28">Name :-</span>
                                <span class="text-gray-600">{{$post->user ? $post->user->name : 'not found'}}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <span class="font-medium text-gray-700 md:w-28">Email :-</span>
                                <span class="text-gray-600">{{ $post['user']? $post['user']['email']: 'not found' }}</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col md:flex-row md:items-center">
                                <span class="font-medium text-gray-700 md:w-28">Created At :-</span>
                                <span class="text-gray-600">{{ $post['user']? $post->user->created_at->format('l jS \\of F Y h:i:s A'): 'not Found' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Back to All Posts Button -->
            <div class="flex justify-end">
                <a href="{{ route('posts.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    Back to All Posts
                </a>
            </div>
        </div>
</x-layout>