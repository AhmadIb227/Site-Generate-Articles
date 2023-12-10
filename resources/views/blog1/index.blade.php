@extends('layout1.appar')
@section('content')
  <main>
    <section class="py-5 text-center container">
      <div class="row py-lg-5"><br>
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">مثال الألبوم</h1>
          <p class="lead text-body-secondary">وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">الدعوة الرئيسية للعمل</a>
            <a href="#" class="btn btn-secondary my-2">عمل ثانوي</a>
          </p>
        </div>
      </div>
    </section>
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <a href="{{ route('blog.create')}}" class="d-flex justify-content-between align-items-center">Add post</a>
        
        @if (sessions('post_deleted'))
            <div class="alert alert-success">
              {{ sessions('post_deleted') }}
            </div>
        @endif

        @if (sessions('post_created'))
            <div class="alert alert-success">
              {{ sessions('post_created') }}
            </div>
        @endif


        <br>
        <br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> 
          @forelse ($post as $k )     
            <div class="col">
              <div class="card shadow-sm">
                  @if($post->image)
                    {
                        <img src="{{ asset('images/'.$post->image) }}" alt="">
                    }
                  @else
                    {
                      <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>

                    }
                  @endif
                <div class="card-body">
                  <h3> {{ $k->title }}</h3>
                  <br>
                  <p >
                        {{ $k->body }}
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ route('blog.show',$post->id) }}" class="btn btn-sm btn-outline-secondary">view</a>
                      <a href="{{ route('blog.edit',$post->id) }}" class="btn btn-sm btn-outline-secondary">edit</a>
                      <form action="{{ route('blog.destroy',$post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-secondary">delete</button>
                      </form>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">ijh</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي. هذا المحتوى أطول قليلاً.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي. هذا المحتوى أطول قليلاً.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي. هذا المحتوى أطول قليلاً.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي. هذا المحتوى أطول قليلاً.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي. هذا المحتوى أطول قليلاً.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي. هذا المحتوى أطول قليلاً.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>
                <div class="card-body">
                  <p class="card-text">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي. هذا المحتوى أطول قليلاً.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>
                    </div>
                    <small class="text-body-secondary">9 دقائق</small>
                  </div>
                </div>
              </div>
            </div>  --}}
            @empty
            <p>sdklv</p>    
          @endforelse      
        </div>   
      </div>
    </div> 
  </main>
@endsection