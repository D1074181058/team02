<div class="container">

<div   class="form-group">
    {!! Form::Label('property','派系') !!}
    {!! Form::text('property',null,['class'=>'form-control']) !!}
</div>

<div  class="form-group">
    {!! Form::Label('characteristic','特性') !!}
    {!! Form::text('characteristic',null,['class'=>'form-control']) !!}
</div>

<div  class="form-group">
    {!! Form::Label('home','主場') !!}
    {!! Form::text('home',null,['class'=>'form-control']) !!}
</div>

<div  class="form-group">
    {!! Form::Label('weakness','弱點屬性') !!}
    {!! Form::text('weakness',null,['class'=>'form-control']) !!}
</div>
<div align="center"  class="form-group">
    {!! Form::submit('確定',['class' =>'btn btn-primary form-control']) !!}
</div>

</div>
