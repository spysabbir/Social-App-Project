@extends('backend.layouts.backend-master')

@section('title', 'Dashboard')

@section('content')
<div class="dash-wrapper bg-dark">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-cols-xxl-5">
        <div class="col border-end border-light-2">
            <div class="card bg-transparent shadow-none mb-0">
                <div class="card-body text-center">
                   <p class="mb-1 text-white">Total Users</p>
                   <h3 class="mb-3 text-white">{{ $allUser }}</h3>
                   <p class="font-13 text-white"><span class="text-success"><i class="lni lni-arrow-up"></i>{{ App\Models\User::whereMonth('created_at', date('m'))->count() }}</span> {{ date('F') }} Month</p>
                </div>
            </div>
        </div>
        <div class="col border-end border-light-2">
           <div class="card bg-transparent shadow-none mb-0">
               <div class="card-body text-center">
                  <p class="mb-1 text-white">Total Post</p>
                  <h3 class="mb-3 text-white">{{ $allPost }}</h3>
                  <p class="font-13 text-white"><span class="text-success"><i class="lni lni-arrow-up"></i> {{ App\Models\Post::whereMonth('created_at', date('m'))->count() }} </span> {{ date('F') }} Month</p>
               </div>
           </div>
       </div>
       <div class="col border-end border-light-2">
           <div class="card bg-transparent shadow-none mb-0">
               <div class="card-body text-center">
                  <p class="mb-1 text-white">Total Comment</p>
                  <h3 class="mb-3 text-white">{{ $allComment }}</h3>
                  <p class="font-13 text-white"><span class="text-danger"><i class="lni lni-arrow-down"></i> {{ App\Models\Comment::whereMonth('created_at', date('m'))->count() }} </span> {{ date('F') }} Month</p>
               </div>
           </div>
       </div>
       <div class="col">
           <div class="card bg-transparent shadow-none mb-0">
               <div class="card-body text-center">
                  <p class="mb-1 text-white">Total Like</p>
                  <h3 class="mb-3 text-white">{{ $allLike }}</h3>
                  <p class="font-13 text-white"><span class="text-success"><i class="lni lni-arrow-up"></i> {{ App\Models\Like::whereMonth('created_at', date('m'))->count() }} </span> {{ date('F') }} Month</p>
               </div>
           </div>
       </div>
    </div><!--end row-->
</div>

<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
    <div class="col d-flex">
        <div class="card radius-10 p-0 w-100 bg-transparent shadow-none">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Today User</p>
                            <h5 class="mb-0">{{ App\Models\User::whereDate('created_at', date('Y-M-D'))->count() }}</h5>
                        </div>
                        <div class="widgets-icons bg-light-primary text-primary ms-auto"><i class="bx bxs-cookie"></i></div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Today Post</p>
                            <h5 class="mb-0">{{ App\Models\Post::whereDate('created_at', date('Y-M-D'))->count() }}</h5>
                        </div>
                        <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="bx bxs-bookmark-alt-plus"></i></div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Today Comment</p>
                            <h5 class="mb-0">{{ App\Models\Comment::whereDate('created_at', date('Y-M-D'))->count() }}</h5>
                        </div>
                        <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-cloud-download"></i></div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Today Like</p>
                            <h5 class="mb-0">{{ App\Models\Like::whereDate('created_at', date('Y-M-D'))->count() }}</h5>
                        </div>
                        <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="bx bxs-bookmark-alt-plus"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col d-flex">
        <div class="col d-flex">
            <div class="card radius-10 p-0 w-100 p-3">
                <div class="card radius-10 shadow-none bg-transparent border">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                            <div class="">
                                <p class="mb-0 d-flex align-items-center"><i class='bx bx-male text-danger fs-4'></i><span class="mx-2">Male User</span><span>{{ App\Models\User::where('gender', 'Male')->count() }}</span></p>
                                <p class="mb-0 d-flex align-items-center"><i class='bx bx-female text-primary fs-4'></i><span class="mx-2">Female User</span><span>{{ App\Models\User::where('gender', 'Female')->count() }}</span></p>
                                <p class="mb-0 d-flex align-items-center"><i class='bx bx-female text-info fs-4'></i><span class="mx-2">Other User</span><span>{{ App\Models\User::where('gender', 'Other')->count() }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection
