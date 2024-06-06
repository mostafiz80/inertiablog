@extends('admin.layouts.app',['title' => 'Add Category'])


@section('main')


<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-8">
    <form method="POST" action="{{route('categories.update', $scategory->id)}}" enctype="multipart/form-data" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      @csrf
      @method('PUT')
      <div class="lg:flex lg:items-start lg:gap-6 xl:gap-8">
        <div class="min-w-0 flex-1 space-y-2">
          <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Add Category</h2>
  
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label for="category_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Category name </label>
                <input type="text" name="name" id="category_name" value="{{ $scategory->name }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>

              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label for="select-country-input-3" class="block text-sm font-medium text-gray-900 dark:text-white"> Category slug. </label>
                </div>
                <input type="text" name="category_slug" value="{{ $scategory->category_slug }}" id="select-country-input-3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                </input>
                <x-input-error :messages="$errors->get('category_slug')" class="mt-2" />
              </div>

              <div>
                <label for="category_desc" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Category Desc. </label>
                <input type="text" name="description" value="{{ $scategory->description }}" id="category_desc" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="" required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
              </div>
  

  
              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label for="select-city-input-3" class="block text-sm font-medium text-gray-900 dark:text-white"> Category icon. </label>
                </div>
                <input type="file" name="category_image" id="select-city-input-3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">

                </input>
                <x-input-error :messages="$errors->get('icon')" class="mt-2" />

              </div>
  
              <div class="sm:col-span-2">
                <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                  <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                  </svg>
                  Save
                </button>
              </div>
            </div>
          </div>
  

  

  

        </div>
  
        <div class="mt-6 w-full sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-xl">


          <div class="p-8 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                      
                  
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$category->name}}
                        </th>
                        <td class="px-6 py-4">
                          {{$category->category_slug}}
                        </td>
                        <td class="px-6 py-4">
                          <img src="{{url('/')}}/images/category/{{$category->icon}}" alt="" srcset="">
                        </td>

                        <td class="px-6 py-4">
                            <a href="{{route('categories.edit', $category)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        
        </div>
      </div>
    </form>
  </section>
<script>
  // Function to generate slug from category name
  function generateSlug(str) {
    return str.toLowerCase().replace(/\s+/g, '-');
  }

  // Event listener for input change
  document.getElementById('category_name').addEventListener('input', function() {
    var categoryName = this.value;
    var categorySlug = generateSlug(categoryName);
    document.getElementById('select-country-input-3').value = categorySlug;
  });
</script>
  @endsection