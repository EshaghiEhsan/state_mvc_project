@extends('admin.layouts.app')

@section('head-tag')
    <title>ادمین|اگهی</title>
@endsection

@section('content')

    <div class="content-header row">
    </div>

    <div class="content-body">
        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">آگهی</h4>
                            <span><a href="<?= route('admin.ads.create') ?>" class="btn btn-success">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>دسته</th>
                                            <th>آدرس</th>
                                            <th>تصویر</th>
                                            <th>مشخصات</th>
                                            <th>تگ</th>
                                            <th>کاربر</th>
                                            <th style="width: 22rem;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($ads as $adss){ ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?= $adss->id ?></td>
                                                <td><?= $adss->title ?></td>
                                                <td><?= $adss->category()->name ?></td>
                                                <td><?= $adss->address ?></td>
                                                <td><img style="width: 90px;" src="<?= asset($adss->image) ?>" alt=""></td>
                                                <td>
                                                    <ul>
                                                        <li>floor : <?= $adss->floor ?></li>
                                                        <li>year : <?= $adss->year ?></li>
                                                        <li>storeroom : <?= $adss->storeroom ?></li>
                                                        <li>balcony : <?= $adss->balcony ?></li>
                                                        <li>area : <?= $adss->area ?></li>
                                                        <li>room : <?= $adss->room ?></li>
                                                        <li>toilet : <?= $adss->toilet ?></li>
                                                        <li>parking : <?= $adss->parking ?></li>
                                                    </ul>
                                                </td>
                                                <td><?= $adss->tag ?></td>
                                                <td><?= $adss->user()->first_name().' '.$adss->user()->last_name() ?></td>
                                                <td style="width: 22rem;">
                                                    <a href="<?= route('admin.ads.gallery',['id'=>$adss->id]) ?>" class="btn btn-warning waves-effect waves-light">گالری</a>
                                                    <a href="<?= route('admin.ads.edit',['id'=>$adss->id]) ?>" class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                    <form class="d-inline" action="<?= route('admin.ads.delete',['id'=>$adss->id]) ?>" method="post">
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>

@endsection