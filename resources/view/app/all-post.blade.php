@extends('app.layouts.app')

@section('head-tag')

    <title>پست ها</title>

@endsection


@section('content')

    <div class="hero-wrap" style="background-image: url('<?= asset('images/bg_1.jpg') ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span> <span>بلاگ</span></p>
                    <h1 class="mb-3 bread">بلاگ ها</h1>
                </div>
            </div>
        </div>
    </div>
<!--    --><?//= dd('hi') ?>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <?php foreach (paginate($posts, 1) as $post) { ?>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="<?= route('home.post', [$post->id]) ?>" class="block-20" style="background-image: url('<?= asset($post->image) ?>');">
                        </a>
                        <div class="text mt-3 d-block">
                            <h3 class="heading mt-3"><a href="<?= route('home.post', [$post->id]) ?>"><?= $post->title ?></a></h3>
                            <div class="meta mb-3">
                                <div><a href="#"><?= \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %d، %Y') ?></a></div>
                                <div><a href="#"><?= $post->user()->first_name . ' ' . $post->user()->last_name ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?= paginateView($posts, 1) ?>
        </div>
    </section>

@endsection
