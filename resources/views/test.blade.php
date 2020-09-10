@extends('layouts.app')

@section('content')



<div class="test"> 
   <div class="container">
    <form action="/testo" method="POST">
      @csrf
      <section>

        <div class="panel panel-footer">
          <table class="table table-bordered">
            <thead>
              <tr> 
                <th>Title</th>
                <th>Body</th>

                <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" name="title[]" class="form-control" required=""></td>
                <td><input type="text" name="body[]" class="form-control"></td>

                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
              </tr>
              </tr>
            </tbody>
            <tfoot>
              <tr>

                <td><input type="submit" name="submit" value="Submit" class="btn btn-success"></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </section>
    </form>
  </div>

</div>









@endsection

