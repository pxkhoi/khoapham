<form action="{{ route('postFile') }}" method="post" enctype="multipart/form-data" >
    @csrf
    <input type="file" name="myFile" id="myFile">
    <input type="submit" >
</form>