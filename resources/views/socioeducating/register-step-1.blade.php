@extends('layouts.main')

@section('title', 'Cadastro de Socioeducando')

@section('container')
 

<div class="container mt-4">



<div class="div-progress-bar-custom">

<div class="progress-bar-custom">
<div class="progress-steps">
<div class="progress-step active">
<div class="dot"></div>
<div class="label">Dados Pessoais</div>
</div>
<div class="progress-step">
<div class="dot"></div>
<div class="label">Dados Processuais</div>
</div>
</div>
</div>

</div>
<form action="{{ route('socioeducating.register_step_1_store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-section">
<h5 class="section-title">Informações Pessoais</h5>
<div class="row">
<div class="col-12 col-md-4 text-center">
<div class="avatar-wrapper">
<div class="avatar-container" id="avatar-click">
<img id="avatar-preview" src="#" alt="Foto do Socioeducando" style="display: none;">
<i class="fas fa-user" id="default-user-icon"></i>
</div>
<i class="fas fa-plus add-icon" id="add-icon"></i>
</div>
<input type="file" name="photo" id="photo-input" style="display: none;" accept="image/*">
</div>
<div class="col-12 col-md-8">
<div class="row">
<div class="col-12 mb-4">
<div class="form-outline">
<input type="text" id="full_name" name="full_name" class="form-control" />
<label class="form-label" for="full_name">Nome completo</label>
</div>
</div>
<div class="col-12 col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="social_name" name="social_name" class="form-control" />
<label class="form-label" for="social_name">Nome social</label>
</div>
</div>
<div class="col-12 col-md-6 mb-4">
<div class="form-check form-check-inline mt-2">
<input class="form-check-input" type="checkbox" id="naoAplica" value="1" />
<label class="form-check-label" for="naoAplica">Não se aplica</label>
</div>
</div>
<div class="col-12 col-md-6 mb-4">
<div class="form-outline">
<input type="date" id="birth_date" name="birth_date" class="form-control" />
<label class="form-label" for="birth_date">Data nascimento</label>
</div>
</div>
<div class="col-12 col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="document_id" name="document_id" class="form-control" />
<label class="form-label" for="document_id">Documento identificação</label>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="form-section">
<h5 class="section-title">Escolaridade e Identidade</h5>
<div class="row">
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="marital_status" name="marital_status" class="form-control" />
<label class="form-label" for="marital_status">Estado civil</label>
</div>
</div>
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="gender_identity" name="gender_identity" class="form-control" />
<label class="form-label" for="gender_identity">Identidade de gênero</label>
</div>
</div>
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="race_color" name="race_color" class="form-control" />
<label class="form-label" for="race_color">Cor/Raça</label>
</div>
</div>
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="schooling" name="schooling" class="form-control" />
<label class="form-label" for="schooling">Escolaridade</label>
</div>
</div>
<div class="col-md-4 mb-4">
<div class="form-outline">
<input type="number" step="0.1" id="weight" name="weight_kg" class="form-control" />
<label class="form-label" for="weight">Peso (kg)</label>
</div>
</div>
<div class="col-md-4 mb-4">
<div class="form-outline">
<input type="number" step="0.1" id="height" name="height_cm" class="form-control" />
<label class="form-label" for="height">Altura (cm)</label>
</div>
</div>
<div class="col-md-4 mb-4">
<div class="form-outline">
<input type="text" id="bmi_display" class="form-control" disabled />
<label class="form-label" for="bmi_display">IMC</label>
</div>
</div>
</div>
</div>

<div class="form-section">
<h5 class="section-title">Endereço</h5>
<div class="form-outline mb-4">
<textarea class="form-control" id="address" name="address" rows="4"></textarea>
<label class="form-label" for="address">Endereço completo</label>
</div>
</div>

<div class="form-section">
<h5 class="section-title">Filiação</h5>
<div class="row">
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="affiliation" name="affiliation" class="form-control" />
<label class="form-label" for="affiliation">Filiação</label>
</div>
</div>
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="contact" name="contact" class="form-control" />
<label class="form-label" for="contact">Contato</label>
</div>
</div>
</div>
</div>

<div class="btn-container">
<a href="#" class="btn btn-outline-primary">Cancelar</a>
<button type="submit" class="btn btn-primary">Avançar</button>
</div>

</form>
</div>
@endsection

@section('css')
<style>
.avatar-wrapper {
    position: relative;
    width: 150px;
    height: 150px;
    margin: 0 auto 15px auto;
}

.avatar-container {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    cursor: pointer;
    border: 2px dashed #ccc;
    position: relative;
}

.avatar-container i.fas.fa-user {
    font-size: 5rem;
    color: #ced4da;
    position: absolute;
    z-index: 1;
}

.add-icon {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    padding: 5px;
    font-size: 1.5rem;
    line-height: 1;
    z-index: 2;
    cursor: pointer;
}

#avatar-preview {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    display: none;
}
</style>
@endsection

@section('js')

<script>
document.getElementById('weight').addEventListener('input', calcBMI);
document.getElementById('height').addEventListener('input', calcBMI);

function calcBMI() {
    let w = parseFloat(document.getElementById('weight').value);
    let h = parseFloat(document.getElementById('height').value) / 100;
    let bmiElement = document.getElementById('bmi_display');

    if (w > 0 && h > 0) {
        let bmi = (w / (h * h)).toFixed(2);
        bmiElement.value = bmi;
    } else {
        bmiElement.value = '';
    }

    if (mdb.Input.getInstance(bmiElement.parentNode)) {
        mdb.Input.getInstance(bmiElement.parentNode).update();
    }
}

const avatarContainer = document.getElementById('avatar-click');
const photoInput = document.getElementById('photo-input');
const avatarPreview = document.getElementById('avatar-preview');
const defaultUserIcon = document.getElementById('default-user-icon');

avatarContainer.addEventListener('click', () => {
    photoInput.click();
});

photoInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            avatarPreview.src = e.target.result;
            avatarPreview.style.display = 'block';
            defaultUserIcon.style.display = 'none';
        };
        reader.readAsDataURL(file);
    } else {
        avatarPreview.src = '#';
        avatarPreview.style.display = 'none';
        defaultUserIcon.style.display = 'block';
    }
});

document.addEventListener('DOMContentLoaded', function () {
    mdb.Input.init();
    mdb.Select.init();
    mdb.Checkbox.init();
    mdb.Radio.init();
    mdb.Textarea.init();
});

</script>

@endsection