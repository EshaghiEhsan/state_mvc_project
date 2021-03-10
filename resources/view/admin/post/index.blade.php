@extends('admin.layouts.app')

@section('head-tag')
    <title>ادمین|پست</title>
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
                            <h4 class="card-title">اخبار</h4>
                            <span><a href="<?= route('admin.post.create') ?>" class="btn btn-success">ایجاد</a></span>
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
                                            <th>نویسنده</th>
                                            <th>تصویر</th>
                                            <th style="min-width: 16rem; text-align: left;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($posts as $post){ ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $post->id ?></td>
                                            <td><?= $post->title ?></td>
                                            <td><?= $post->category()->name ?></td>
                                            <td><?= $post->user()->first_name.' '.$post->user()->last_name ?></td>
                                            <td><img style="width: 90px;" src="<?= asset($post->image) ?>" alt=""></td>
                                            <td style="min-width: 16rem; text-align: left;">
                                                <a href="<?= route('admin.post.edit',[$post->id]) ?>" class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                <a data-p1="<?= $post->id ?>" class="btn btn-danger waves-effect waves-light ilike">حذف</a>
                                                <a href="" class="btn btn-warning waves-effect waves-light">وضعیت</a>
                                            </td>
                                        </tr>
<!--                                        --><?//= route('admin.post.delete',[$post->id]) ?>
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

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>


        $(function(){
            $('.ilike').click(function(){

                var tr=$(this).closest('tr');
                var $this = $(this);
                var p1 = $this.data('p1');
                alert(tr);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {

                        $.ajax({

                            url:"/admin/post/delete/"+p1,
                            type:'DELETE',

                            success:function(data){

                                tr.remove();
                                //location.reload();
                                if(($("#content").text())=="welcome"){

                                    return;
                                }
                                else if(($("#content").text())=="error"){
                                    $("#content").removeClass();
                                }
                            }
                        });

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                    }
                })
            });
        });
    </script>

@endsection