@extends('backend.layout.app')


@section('styles')
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/morris.js/morris.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <div class="row">
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{ $args['comments_count'] }}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3>{{ $args['posts_count'] }}<sup style="font-size: 20px">%</sup></h3>

                      <p>Posts</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="{{ route('posts.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $args['users_count'] }}</h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
