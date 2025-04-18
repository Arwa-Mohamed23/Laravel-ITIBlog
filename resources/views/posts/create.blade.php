<x-layout>

@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-800">Create New Post</h2>
                </div>
                
                <div class="px-6 py-4">
                    <form method="POST" action="/posts" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea id="description" name="description" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Post Image (JPG, PNG only)</label>
                            <input type="file" id="image" name="image" accept=".jpg,.png" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <p class="mt-1 text-sm text-gray-500">Maximum size: 5MB</p>
                        </div>
                        
                        <div class="mb-6">
                            <label for="post_creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                            <select id="post_creator" name="post_creator" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 bg-white">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md font-medium text-sm transition-colors duration-200">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>