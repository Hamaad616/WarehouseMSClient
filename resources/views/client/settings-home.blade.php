<style>
    .layout-top-nav .content-wrapper .content {
        padding: 0;
        margin-right: auto;
        margin-left: auto;
    }

    .content {
        min-height: 250px;
        padding: 0.75rem 1.5rem 0px 1.5rem;
        margin-right: auto;
        margin-left: auto;
    }

    *, *::before, *::after {
        box-sizing: border-box;
    }


    section {
        display: block;
    }

    .mb-20 {
        margin-bottom: 20px !important;
    }

    .col-12 {
        flex: 0 0 auto;
        width: 100%;
    }

    .row > * {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x) / 2);
        padding-left: calc(var(--bs-gutter-x) / 2);
        margin-top: var(--bs-gutter-y);
    }

    .g-4, .gy-4 {
        --bs-gutter-y: 1.5rem;
    }

    .g-4, .gx-4 {
        --bs-gutter-x: 1.5rem;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(var(--bs-gutter-y) * -1);
        margin-right: calc(var(--bs-gutter-x) / -2);
        margin-left: calc(var(--bs-gutter-x) / -2);
    }

    @media (min-width: 992px) {
        .row-cols-lg-3 > * {
            flex: 0 0 auto;
            width: 33.3333333333%;
        }
    }

    .row-cols-1 > * {
        flex: 0 0 auto;
        width: 100%;
    }

    .col {
        flex: 1 0 0%;
    }

    .row > * {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x) / 2);
        padding-left: calc(var(--bs-gutter-x) / 2);
        margin-top: var(--bs-gutter-y);
    }

    .card {
        border-radius: 10px;
        box-shadow: 0px 2px 5px 0px rgb(19 23 38 / 5%);
        margin-bottom: 1.5rem !important;
    }

    .h-p100 {
        height: 100% !important;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1rem 1rem;
    }

    .card-body .card-title {
        margin-bottom: 0.75rem;
        border-bottom: none;
    }

    .card-title {
        margin-bottom: 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.07);
    }

    .px-0 {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .b-0 {
        border: 0px solid #f3f6f9 !important;
    }

    .px-0 {
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .card-title {
        margin-bottom: 0.5rem;
    }

    .h4, h4 {
        font-size: 1.2857142857142858rem;
    }

    h4, .h4, h5, .h5, h6, .h6 {
        margin-bottom: 0.7142857143rem;
    }

    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        font-family: "Rubik", sans-serif;
        font-weight: 400;
        line-height: 1.2;
    }

    @media (min-width: 1200px) {
        h4, .h4 {
            font-size: 1.5rem;
        }
    }

    h4, .h4 {
        font-size: calc(1.275rem + 0.3vw);
    }

    h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    h4 {
        display: block;
        margin-block-start: 1.33em;
        margin-block-end: 1.33em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

</style>

{{--<header class="xNklye">--}}
    <div class="B1tEqd">
        <div class="cstRMd">
            <button type="button" class="hryX1e  rN3O0d"
                    aria-haspopup="dialog"
                    aria-label="change profile picture">
                <style nonce="">.HJOYVi13 {
                        width: 96px;
                        height: 96px;
                    }</style>
                <figure class="HJOYV HJOYVi13 Vz93id" aria-hidden="true"><img class="YPzqGd"></figure>
                <div class="SC4xFe">
                    <div class="EyVCdb"></div>
                </div>
            </button>
        </div>
        <br>
    </div>
    <h1 class="x7WrMb">Welcome, {{session('username')}}</h1>
    <div class="cmSWBc">Manage your info, and subscriptions to make Us work better for you.</div>

    <section class="content">

        <div class="row">
            <div class="col-12 mb-20">
                <div class="row row-cols-1 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card h-p100">

                            <div class="card-body">
                                <div id="example" data-donutty data-min=-50 data-max=50 data-value=-20>
                                    <span class="text-secondary">
                                        <span class="fs-36">58%</span>
                                        <br>Location used
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer justify-content-between d-flex">
                                <span class="text-muted">Last updated 3 mins ago</span>
                                <span>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star-half text-warning"></i>
									<span class="text-muted ms-2">(12)</span>
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-p100">

                            <div class="card-body">
                                <div id="example" data-donutty></div>
                            </div>
                            <div class="card-footer justify-content-between d-flex">
                                <span class="text-muted">Last updated 3 mins ago</span>
                                <span>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star-half text-warning"></i>
									<span class="text-muted ms-2">(12)</span>
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-p100">
                            <div class="card-body">
                                <div id="example" data-donutty></div>
                            </div>
                            <div class="card-footer justify-content-between d-flex">
                                <span class="text-muted">Last updated 3 mins ago</span>
                                <span>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star-half text-warning"></i>
									<span class="text-muted ms-2">(12)</span>
								</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<script src="{{ asset('dist/donutty-jquery.js') }}"></script>




{{--</header>--}}


