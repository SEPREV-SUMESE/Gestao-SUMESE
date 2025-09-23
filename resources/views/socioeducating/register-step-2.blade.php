@extends('layouts.main')

@section('title', 'Cadastro de Socioeducando')

@section('css')
<style>
/* Estilo base para o card do documento */
.doc-card {
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 80px; /* Garante altura mínima para cards vazios */
    position: relative; /* Para posicionamento de elementos internos */
}

.doc-card.uploaded {
    border-color: #007bff; /* Borda azul quando o arquivo é carregado */
}

/* Informações do arquivo */
.file-info {
    flex-grow: 1;
}

.file-info h6 {
    margin-bottom: 0.25rem;
    color: #000; /* Cor preta para o título */
}

.file-info small {
    display: block; /* Garante que 'Arquivo não carregado' fique em sua própria linha */
    font-size: 0.85rem;
    color: #6c757d; /* Cor cinza para o status */
}

.file-info .file-size {
    font-size: 0.85rem;
    color: #6c757d; /* Cor cinza para o tamanho do arquivo */
    margin-top: 0.25rem; /* Espaçamento entre nome do arquivo e tamanho */
}


/* Ações do arquivo (ícones) */
.file-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem; /* Espaçamento entre os ícones */
}

.file-actions i {
    cursor: pointer;
    font-size: 1.1rem; /* Tamanho dos ícones */
    color: #007bff; /* Cor azul para os ícones */
}

.file-actions i.delete-icon {
    color: #dc3545; /* Cor vermelha para o ícone de lixeira */
}

/* Estilos para o estado 'not-uploaded' */
.doc-card.not-uploaded .view-icon,
.doc-card.not-uploaded .delete-icon,
.doc-card.not-uploaded .file-size {
    display: none !important; /* Esconde ícones de visualização/exclusão e tamanho quando não há arquivo */
}

/* Estilos para o estado 'uploaded' */
.doc-card.uploaded .upload-icon,
.doc-card.uploaded .file-info small { /* Esconde o ícone de upload e o texto 'Arquivo não carregado' */
    display: none !important;
}

.doc-card.uploaded .file-info h6 {
    color: #007bff; /* Título azul quando há arquivo */
}

/* Estilo para o ícone de upload quando visível */
.file-actions .upload-icon i {
    font-size: 1.5rem; /* Ícone de upload maior */
    color: #6c757d; /* Cor cinza para o ícone de upload */
}

/* Esconder o input file real */
.d-none {
    display: none !important;
}
</style>
@endsection

@section('container')

<div class="div-progress-bar-custom">
    <div class="progress-bar-custom completed">
        <div class="progress-steps ">
            <div class="progress-step completed">
                <div class="dot"></div>
                <div class="label">Dados Pessoais</div>
            </div>
            <div class="progress-step active">
                <div class="dot"></div>
                <div class="label">Dados Processuais</div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('socioeducating.register_step_2_store', $socioeducating->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-section">
        <h5 class="section-title">Documentação Apresentada</h5>
        <p>Faça o upload de toda a documentação apresentada pelo Socioeducando.</p>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            {{-- Card Guia CNJ --}}
            <div class="col">
                <div class="doc-card not-uploaded" id="cnj_guide_card">
                    <div class="file-info">
                        <h6>Guia CNJ</h6>
                        <small id="cnj_guide_status">Arquivo não carregado.</small>
                        <span class="file-size" id="cnj_guide_size"></span>
                    </div>
                    <div class="file-actions">
                        <i class="fas fa-eye view-icon d-none"></i>
                        <i class="fas fa-trash delete-icon d-none"></i>
                        <label for="cnj_guide_path" class="d-inline-block upload-icon"><i class="fas fa-file-alt"></i></label>
                        <input type="file" name="cnj_guide_path" id="cnj_guide_path" class="d-none">
                    </div>
                </div>
            </div>
            {{-- Card Representação MP --}}
            <div class="col">
                <div class="doc-card not-uploaded" id="mp_representation_card">
                    <div class="file-info">
                        <h6>Representação do Ministério Público</h6>
                        <small id="mp_representation_status">Arquivo não carregado.</small>
                        <span class="file-size" id="mp_representation_size"></span>
                    </div>
                    <div class="file-actions">
                        <i class="fas fa-eye view-icon d-none"></i>
                        <i class="fas fa-trash delete-icon d-none"></i>
                        <label for="mp_representation_path" class="d-inline-block upload-icon"><i class="fas fa-file-alt"></i></label>
                        <input type="file" name="mp_representation_path" id="mp_representation_path" class="d-none">
                    </div>
                </div>
            </div>
            {{-- Card Sentença/Decisão Judicial --}}
            <div class="col">
                <div class="doc-card not-uploaded" id="judicial_decision_card">
                    <div class="file-info">
                        <h6>Sentença/Decisão Judicial</h6>
                        <small id="judicial_decision_status">Arquivo não carregado.</small>
                        <span class="file-size" id="judicial_decision_size"></span>
                    </div>
                    <div class="file-actions">
                        <i class="fas fa-eye view-icon d-none"></i>
                        <i class="fas fa-trash delete-icon d-none"></i>
                        <label for="judicial_decision_path" class="d-inline-block upload-icon"><i class="fas fa-file-alt"></i></label>
                        <input type="file" name="judicial_decision_path" id="judicial_decision_path" class="d-none">
                    </div>
                </div>
            </div>
            {{-- Card Documento de Identificação Pessoal --}}
            <div class="col">
                <div class="doc-card not-uploaded" id="personal_doc_card">
                    <div class="file-info">
                        <h6>Documento de Identificação Pessoal</h6>
                        <small id="personal_doc_status">Arquivo não carregado.</small>
                        <span class="file-size" id="personal_doc_size"></span>
                    </div>
                    <div class="file-actions">
                        <i class="fas fa-eye view-icon d-none"></i>
                        <i class="fas fa-trash delete-icon d-none"></i>
                        <label for="personal_doc_path" class="d-inline-block upload-icon"><i class="fas fa-file-alt"></i></label>
                        <input type="file" name="personal_doc_path" id="personal_doc_path" class="d-none">
                    </div>
                </div>
            </div>
            {{-- Card Guia de Exame Pericial (IML) --}}
            <div class="col">
                <div class="doc-card not-uploaded" id="forensic_exam_card">
                    <div class="file-info">
                        <h6>Guia de Exame Pericial (IML)</h6>
                        <small id="forensic_exam_status">Arquivo não carregado.</small>
                        <span class="file-size" id="forensic_exam_size"></span>
                    </div>
                    <div class="file-actions">
                        <i class="fas fa-eye view-icon d-none"></i>
                        <i class="fas fa-trash delete-icon d-none"></i>
                        <label for="forensic_exam_path" class="d-inline-block upload-icon"><i class="fas fa-file-alt"></i></label>
                        <input type="file" name="forensic_exam_path" id="forensic_exam_path" class="d-none">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-section">
        <h5 class="section-title">Unidade / Jurisdição</h5>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" id="detention_unit" name="detention_unit" class="form-control" />
                    <label class="form-label" for="detention_unit">Unidade de internação</label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" id="county" name="county" class="form-control" />
                    <label class="form-label" for="county">Comarca</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-section">
        <h5 class="section-title">Medida Socioeducativa Aplicada</h5>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="form-outline">
                    <input type="text" id="applied_measure" name="applied_measure" class="form-control" />
                    <label class="form-label" for="applied_measure">Medida Aplicada</label>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="form-outline">
                    <input type="date" id="decision_date" name="decision_date" class="form-control" />
                    <label class="form-label" for="decision_date">Data da decisão</label>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="form-outline">
                    <input type="date" id="entry_date" name="entry_date" class="form-control" />
                    <label class="form-label" for="entry_date">Data de entrada</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-section">
        <h5 class="section-title">Observações</h5>
        <div class="form-outline">
            <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
            <label class="form-label" for="notes">Observações</label>
        </div>
    </div>

    <div class="form-section">
        <h5 class="section-title">Processos Judiciais</h5>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" id="process_number" name="process_number" class="form-control" />
                    <label class="form-label" for="process_number">Nº Processo Conhecimento</label>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" id="execution_process_number" name="execution_process_number" class="form-control" />
                    <label class="form-label" for="execution_process_number">Nº Processo Execução</label>
                </div>
            </div>
        </div>
    </div>

    <div class="btn-container">
        <a href="{{ route('socioeducating.register_step_1') }}" class="btn btn-outline-primary">Voltar</a>
        <button type="submit" class="btn btn-primary">Concluir</button>
    </div>
</form>

@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inicializa cada componente MDB individualmente para evitar o erro de 'init'
    // Esta é a abordagem mais compatível entre as diferentes versões do MDB
    try {
        const inputs = document.querySelectorAll('.form-outline');
        inputs.forEach(input => new mdb.Input(input).init());
        
        // Se você tiver outros componentes, inicialize-os aqui
        // Ex: new mdb.Select(selectElement).init();
    } catch (e) {
        console.error('Erro ao inicializar componentes do MDB:', e);
    }
    
    // Seu restante do código JavaScript para manipular os uploads de arquivos
    const fileInputsData = [
        { id: 'cnj_guide_path', name: 'Guia CNJ' },
        { id: 'mp_representation_path', name: 'Representação do Ministério Público' },
        { id: 'judicial_decision_path', name: 'Sentença/Decisão Judicial' }, 
        { id: 'personal_doc_path', name: 'Documento de Identificação Pessoal' },
        { id: 'forensic_exam_path', name: 'Guia de Exame Pericial (IML)' }
    ];

    fileInputsData.forEach(fileData => {
        const input = document.getElementById(fileData.id);
        
        if (input) {
            const card = input.closest('.doc-card');
            const statusSpan = document.getElementById(`${fileData.id.replace('_path', '_status')}`);
            const sizeSpan = document.getElementById(`${fileData.id.replace('_path', '_size')}`);
            const viewIcon = card.querySelector('.view-icon');
            const deleteIcon = card.querySelector('.delete-icon');
            const uploadLabel = card.querySelector('.upload-icon');

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 MB';
                const megabytes = bytes / (1024 * 1024);
                return `${megabytes.toFixed(2)} MB`;
            }

            input.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    statusSpan.textContent = file.name;
                    sizeSpan.textContent = formatFileSize(file.size);
                    
                    card.classList.remove('not-uploaded');
                    card.classList.add('uploaded');

                    uploadLabel.classList.add('d-none');
                    viewIcon.classList.remove('d-none');
                    deleteIcon.classList.remove('d-none');
                } else {
                    statusSpan.textContent = 'Arquivo não carregado.';
                    sizeSpan.textContent = '';
                    
                    card.classList.remove('uploaded');
                    card.classList.add('not-uploaded');

                    uploadLabel.classList.remove('d-none');
                    viewIcon.classList.add('d-none');
                    deleteIcon.classList.add('d-none');
                }
            });

            deleteIcon.addEventListener('click', () => {
                input.value = '';
                input.dispatchEvent(new Event('change'));
            });

            viewIcon.addEventListener('click', () => {
                if (input.files.length > 0) {
                    const file = input.files[0];
                    const fileURL = URL.createObjectURL(file);
                    window.open(fileURL, '_blank');
                    URL.revokeObjectURL(fileURL);
                }
            });
        } else {
            console.error(`Input com ID '${fileData.id}' não encontrado.`);
        }
    });
});
</script>

@endsection