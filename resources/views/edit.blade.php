<form action="" method="POST">
    @csrf
    <label for="">Name</label> <br>
    <input type="text" name="name" id="" placeholder="Name..." value="{{old('name')??$student->name}}"> <br>
    <label for="">Phone</label> <br>
    <input type="text" name="phone" id="" placeholder="Phone..." value="{{old('name')??$student->phone}}"> <br>
    <button type="submit">Thêm</button>
</form>