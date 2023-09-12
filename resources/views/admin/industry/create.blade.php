<div class="wrapper">
    <p class="text">業界 : 新規作成</p>
<form action="{{ route('admin.industry.make') }}" method="post">
    　　　　@csrf
           <input type="text" name="name">
           <div class="buttons" style="display: flex">
           
           <button style="margin-left: 10px" type="submit">作成</button>
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
        transform: translateX(-20%);
        margin-bottom: 32px;
        text-align: center;
     }
    </style>