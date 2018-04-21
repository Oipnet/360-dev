
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
            <h5 class="card-header">Rechercher</h5>
            <div class="card-body">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher pour...">
                    <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                </div>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled mb-0">
                            @foreach($categories as $category)
                                <li class="mb-2">
                                    <a href="{{ route('blog.category', ['slug' => $category->slug]) }}"
                                        class="list-group-item {{ request()->getUri() === route('blog.category', ['slug' => $category->slug]) ? 'active' : ''}} list-group-item-action">
                                        {{ $category->name }}
                                        <span class="badge badge-primary float-right">{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                   {{-- <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#">JavaScript</a>
                            </li>
                            <li>
                                <a href="#">CSS</a>
                            </li>
                            <li>
                                <a href="#">Tutorials</a>
                            </li>
                        </ul>
                    </div>--}}
                </div>
            </div>
        </div>

        <!-- Side Widget -->
        {{-- <div class="card my-4">
             <h5 class="card-header">Autre</h5>
             <div class="card-body">
                 You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
             </div>
         </div>--}}
    </div>
