@extends('layouts.adminlayout')



@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Soal</h3>
            </div>
            <div class="box-body">
              <form method="post" action="{{route('addsoal')}}">
                <div class="form-group">
                    <label>Gelombang</label>
                    <select class="form-control" name="gelombang">
                      @foreach($gelombang as $value)
                        <option value="{{$value->id}}">{{$value->nama_gelombang}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" >
                </div>
                <div class="form-group">
                    <label>1</label>
                    <input type="text" class="form-control" name="jawaban[]" >
                </div>
                <div class="form-group">
                    <label>2</label>
                    <input type="text" class="form-control" name="jawaban[]" >
                </div>
                <div class="form-group">
                    <label>3</label>
                    <input type="text" class="form-control" name="jawaban[]" >
                </div>
                <div class="form-group">
                    <label>4</label>
                    <input type="text" class="form-control" name="jawaban[]" >
                </div>
                <div class="form-group">
                    <label>Kunci Jawaban</label>
                    <select class="form-control" name="key">
                      <option value="0">1</option>
                      <option value="1">2</option>
                      <option value="2">3</option>
                      <option value="3">4</option>

                    </select>
                </div>
                
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
              
              </form>
            </div>
            
          </div>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Soal</h3>
            </div>
            <div class="box-body">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>Jawaban</th>
                    <th>Gelombang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($soal as $value)
                  <tr>
                    <td>{{$value->deskripsi_soal}}</td>
                    <td>{{$value->jawaban_id}}</td>
                    <td>{{$value->gelombang_lomba_id}}</td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
              
            </div>
          </div>
          
        </div>
        
        <!-- /.box-footer-->
          </div>
        
      

      
      <!-- /.row -->
      <!-- Main row -->


          <!-- /.box -->

       
        <!-- right col -->
      
      <!-- /.row (main row) -->

   


    
@endsection

@section('js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f3sg1vumz2lxhu0dnsl5siku8l31huewo0t2lgn6rkrjab8k"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>




@endsection

      
