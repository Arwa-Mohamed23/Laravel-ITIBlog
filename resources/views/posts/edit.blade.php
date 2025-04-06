<x-layout>
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-800">Update Post</h2>
            </div>
            
            <div class="px-6 py-4">
                <form method="POST" action="{{ route('posts.update', $post['id']) }}">
                    @csrf
                    @method('PATCH')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" id="title" name="title" 
                               value="{{ old('title', $post['title'] ?? '') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="6" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $post['description'] ?? '') }}</textarea>
                    </div>
                    
                    <div class="mb-6">
                        <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                        <select id="creator" name="creator" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 bg-white">
                            <option value="Ahmed" {{ (old('creator', $post['posted_by'] ?? '') == 'Ahmed' ? 'selected' : '') }}>Ahmed</option>
                            <option value="Mohamed" {{ (old('creator', $post['posted_by'] ?? '') == 'Mohamed' ? 'selected' : '') }}>Mohamed</option>
                            <option value="Ali" {{ (old('creator', $post['posted_by'] ?? '') == 'Ali' ? 'selected' : '') }}>Ali</option>
                        </select>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md font-medium text-sm transition-colors duration-200">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>