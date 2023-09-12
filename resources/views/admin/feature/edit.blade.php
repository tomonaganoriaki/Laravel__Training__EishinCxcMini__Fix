<div class="wrapper">
    <p class="text">求人の特徴 : 編集</p>
<form action="{{ route('admin.feature.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
     <input type="text" name="name" value="{{ old('name', $category->name) }}">
     <div class="buttons" style="display: flex">

     <button style="margin-left: 10px" type="submit">更新</button>
    </div>
</form>
</div>

<style>
    .wrapper{
        display: block;
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 100px;
    }
    .text{
        display: block;
        text-align: center;
        font-size: 20px;
        margin-bottom: 20px;

    }
    .buttons{
justify-content: center;    }
input{
        transform: translateX(1%);
        text-align: center;
        margin-bottom: 32px
     }
</style>