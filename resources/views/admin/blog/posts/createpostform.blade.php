@extends('admin.layouts.app',['title' => 'Create new post'])


@section('main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />
<section class="grid grid-cols-2 gap-8">
    <div>        
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

            <div class="w-full">
                <label for="post-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post title</label>
                <input type="text" name="post_title" id="post-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Post title" required="">
            </div>
            <div class="w-full">
                <label for="post-slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post slug</label>
                <input type="text" name="post_slug" id="post-slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Post slug" required="">
            </div>

            <div class="w-full">
                <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Images</label>
                <input type="file" name="post_thumbnail" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="">
            </div> 
            <div class="sm:col-span-2">
                <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Content</label>
                <textarea id="editor" name="post_content" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here" style="width: 100%; height: 300px">Give it a try! :)</textarea>
               
            </div>
        </div>
</div>
    <!-- ... -->
    <div class="mb-4">
        Select Categories
        <div class="w-full mt-4">
            @foreach ($categories as $category)


            <div class="flex items-center mb-4">
                <input id="{{$category->category_slug}}" type="radio" value="{{$category->id}}" name="category_id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="{{$category->category_slug}}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$category->name}}</label>
            </div>
            @endforeach

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add Post
            </button>
        </form>
            
        </div>
    </div>
  </section>


  <script>
    // Function to generate slug from category name
    function generateSlug(str) {
      return str.toLowerCase().replace(/\s+/g, '-');
    }
  
    // Event listener for input change
    document.getElementById('post-title').addEventListener('input', function() {
      var postTitle = this.value;
      var postSlug = generateSlug(postTitle);
      document.getElementById('post-slug').value = postSlug;
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/xhtml.min.js"></script>
  <script>
  // Replace the textarea #example with SCEditor
  var textarea = document.getElementById('editor');
  sceditor.create(textarea, {
      format: 'xhtml',
      style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
  });
  </script>
    @endsection
