<div align="center"  valign="center"  class="form-group">
    {!! Form::Label('name','名字') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div  align="center"  valign="center" class="form-group">
    {!! Form::Label('pr_ID','派系編號') !!}
    {!! Form::text('pr_ID',null,['class'=>'form-control']) !!}
</div>

<div align="center"   valign="center" class="form-group">
    {!! Form::Label('height','身高') !!}
    {!! Form::text('height',null,['class'=>'form-control']) !!}
</div>

<div align="center"  valign="center" class="form-group">
    {!! Form::Label('weight','體重') !!}
    {!! Form::text('weight',null,['class'=>'form-control']) !!}
</div>

<div align="center"   valign="center" class="form-group">
    {!! Form::Label('growing','進化可能') !!}
    {!! Form::text('growing',null,['class'=>'form-control']) !!}
</div>

<div align="center"  valign="center" class="form-group">
    {!! Form::Label('group','地區') !!}
    {!! Form::text('group',null,['class'=>'form-control']) !!}
</div>
<div align="center"  valign="center" class="form-group">
    {!! Form::Label('place','出現場所') !!}
    {!! Form::text('place',null,['class'=>'form-control']) !!}
</div>
<div align="center"  valign="center" class="form-group">
    {!! Form::submit('確定',['class' =>'btn btn-primary form-control']) !!}
</div>
