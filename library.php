<?php include_once('header.php'); ?>
<div class='m-10'>

<div class="flex flex-col text-center w-full mb-20">
        <h3 class="sm:text-4xl text-5xl font-medium title-font mb-2 text-gray-900">🌈 Boost your learning </h3>
    </div>

<div class="flex">
  <div class="flex-none w-48 relative">
    <img src="https://images.pexels.com/photos/904620/pexels-photo-904620.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="absolute inset-0 w-full h-full object-cover" />
  </div>
  <form class="flex-auto p-6">
    <div class="flex flex-wrap">
     <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
        Author - Category
      </div>
      <h1 class="flex-auto text-xl font-semibold">
       Book name
      </h1>
      
      <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
        In stock
      </div>
    </div>
    <div class="flex items-baseline mt-4 mb-6">
        descreption
    </div>
    <div class="flex space-x-3 mb-4 text-sm font-medium">
      <div class="flex-auto flex space-x-3">
        <button class="w-1/2 flex items-center justify-center rounded-md bg-black text-white" type="submit">Buy now</button>
      
      </div>
      <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 " type="button" aria-label="like">
       <!-- <svg width="20" height="20" fill="currentColor">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
        </svg> -->
      </button>
    </div>
    <p class="text-sm text-gray-500">
      Free shipping on all continental US orders.
    </p>
  </form>
</div>


</div>
<?php include_once('footer.php'); ?>