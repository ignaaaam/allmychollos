<section id="menu-container" class="bg-category-gray h-20 flex items-center justify-center w-full">
            <button id="left" class="w-8 mx-4 bg-category-light-gray rounded-md flex items-center justify-center p-2 z-40 3xl:hidden">
                                <svg id="left-arrow" data-name="left-arrow" xmlns="http://www.w3.org/2000/svg" width="10"
                                     height="10" viewBox="0 0 10 16"><defs><style>.cls-1 {
                                                fill: #fff;
                                                fill-rule: evenodd;
                                            }</style></defs><g id="directional"><g id="arrow-left"><polygon id="Shape"
                                                                                                            class="cls-1"
                                                                                                            points="8 0 10 2 4 8 10 14 8 16 0 8 8 0"/></g></g></svg>
            </button>
    <div id="category-container" class="scroll-smooth w-full whitespace-nowrap overflow-x-hidden py-4 flex 3xl:justify-center ">
                         @foreach($categories as $category)
                            <a href="" class="flex justify-center items-center text-white text-sm text-center transition-all hover:font-bold hover:-translate-y-0.5 mx-2 bg-category-lighter-gray p-2 rounded-md">{{ $category->name }}</a>
                         @endforeach
    </div>
    <button id="right" class="w-8 mx-4 bg-category-light-gray rounded-md flex items-center justify-center p-2 z-40 3xl:hidden">
                                                         <svg id="right-arrow" data-name="right-arrow" xmlns="http://www.w3.org/2000/svg" width="10"
                                                              height="10" viewBox="0 0 10 16"><defs><style>.cls-1 {
                                                                         fill: #fff;
                                                                         fill-rule: evenodd;
                                                                     }</style></defs><g id="directional"><g id="arrow-right"><polygon id="Shape"
                                                                                                                                      class="cls-1"
                                                                                                                                      points="2 0 10.01 8 2 16 0 14 6 8 0 2 2 0"/></g></g></svg>
    </button>
</section>
