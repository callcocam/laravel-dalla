<template>
    <div>
        <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target=".bd-example-modal-lg" @click="form = {
                    id:'',
                    name:'',
                    description:'',
                }">Adicionar Tarefa</button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <form id="addUser" @submit.prevent="submitTask()">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-3">
                        <div class="card-title" id="todo-list-validate">Informações da tarefa</div>
                        <div>
                            <div class="form-group">
                                <input v-model="form.name" class="form-control mb-3" id="name" type="text" name="name" aria-describedby="emailHelp" placeholder="Write your new task name" />
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.description" class="form-control" id="description" name="description" placeholder="Add Description...." rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Salvar Tarefa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props:['event', 'task'],
        data() {
            return {
                form:{
                    id:'',
                    event:'',
                    name:'',
                    description:'',
                }
            }
        },
        methods:{

            submitTask(){

                this.form.event = this.event.id

                axios.post('/eventos/tarefas/update',this.form).then(response=>{

                    this.$emit('input', response.data)
                    this.$notify({
                        group: 'foo',
                        title: 'OPPS!!',
                        text: 'Tarefa atualizado com sucesso!!'
                    });

                }).catch(err=>{
                    this.$notify({
                        group: 'foo',
                        title: 'OPPS!!',
                        type: 'warn',
                        text: 'Não foi possivel atualizar a tarefa!!'
                    });
                })
            }
        },
        watch:{
            task(val){

                if(val){
                    this.form = Object.assign({}, val)
                }
            }
        }
    }
</script>
