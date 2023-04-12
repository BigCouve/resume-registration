<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <div class="bg-[#E8D4D1] max-w-7xl px-4 py-12 sm:px-6 sm:py-12 lg:px-8 lg:w-[60vw]">
    <div class="flex items-center flex-col bg-white px-4 py-12 rounded-lg border-4 border-t-[#FFE6FF] border-r-[#FFE6FF] border-b-[#FFEDE6] border-l-[#FFEDE6] ">
      <img src="images/logo-paytour.png" alt="logo paytour" class="object-cover sm:max-w-md mb-10">
      <div class="max-w-2xl">
        <form @submit.prevent>
          <div class="space-y-12">  
            <!-- CODEBLOCK 1 -->
            <div class="border-b border-gray-900/10 pb-12">
              <h2 class="text-base font-semibold leading-7 text-gray-900">Informações pessoais</h2>              
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                  <div class="mt-2">
                    <input type="text" v-model="data.name" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                </div>
      
                <div class="sm:col-span-3">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Endereço de e-mail</label>
                  <div class="mt-2">
                    <input id="email" v-model="data.email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                </div>
      
                <div class="sm:col-span-3">
                  <label for="schooling" class="block text-sm font-medium leading-6 text-gray-900">Escolaridade</label>
                  <div class="mt-2">
                    <select id="schooling" v-model="data.schooling" name="schooling" autocomplete="schooling" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option :value="null">Selecione</option>
                      <option v-for="(schooling, index) in schoolings" :key="index" :value="schooling.level"> {{ schooling.level }} </option>
                    </select>
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Telefone</label>
                  <div class="mt-2">
                    <input id="phone" v-model="data.phone" name="phone" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                  </div>
                </div>
      
                <div class="col-span-full">
                  <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Observações</label>
                  <div class="mt-2">
                    <textarea id="about" v-model="data.observations" name="about" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6" />
                  </div>
                </div>
              </div>
            </div>
            <!-- END CODEBLOCK 1 -->
            <!-- CODEBLOCK 2 -->
            <div class="border-b border-gray-900/10 pb-12">     
              <h2 class="text-base font-semibold leading-7 text-gray-900">Informações da candidatura</h2>

              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">      
                <div class="col-span-full">
                  <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Cargo desejado</label>
                  <div class="mt-2">
                    <!-- here i used textarea, how requested in test description, but it's more visually confortable (UX) for me to use a tag system, or input with autocomplete-->
                    <textarea id="about" v-model="data.desired_job" name="about" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6" />
                  </div>
                </div>
      
                <div class="col-span-full">
                  <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Currículo</label>
                  <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                      <DocumentArrowUpIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                      <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                          <span>Enviar o arquivo</span>
                          <input id="file-upload" @change="listeningFile" name="file-upload" type="file" class="sr-only" />
                        </label>
                        <p class="pl-1">ou arraste e solte</p>
                      </div>
                      <p class="text-xs leading-5 text-gray-600">DOC, DOCX, PDF de até 1MB</p>
                    </div>
                  </div>
                </div>

                
              </div>
            </div>
            <!-- END CODEBLOCK 2 -->
          </div>
      
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
            <button id="button-send-form" @click="sendForm" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enviar</button>
          </div>


          <div v-if="showDataAndScheduleSended" id="alert-form-success" class="space-y-12 mt-5 py-3 px-2 rounded bg-[#BFFFBF]">
            Formulário enviado com sucesso, em {{ date }} às {{ schedule }}
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
  import { PhotoIcon, UserCircleIcon, DocumentArrowUpIcon} from '@heroicons/vue/24/solid';
  import $ from 'jquery';
  import { ref } from 'vue';
  import { defineProps } from 'vue';
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  let file = null;
  // abstracting to array of objects to optimize test delivery time, normally this data came from a table, or consuming an API.
  const schoolings = [
    {
      id : 1,
      level : 'Fundamental - Incompleto'
    },
    {
      id : 2,
      level : 'Fundamental - Completo'
    },
    {
      id : 3,
      level : 'Médio - Incompleto'
    },
    {
      id : 4,
      level : 'Médio - Completo'
    },
    {
      id : 5,
      level : 'Superior - Incompleto'
    },
    {
      id : 6,
      level : 'Superior - Completo'
    },
    {
      id : 7,
      level : 'Pós-graduação (Lato senso) - Incompleto'
    },
    {
      id : 8,
      level : 'Pós-graduação (Lato senso) - Completo'
    },
    {
      id : 9,
      level : 'Pós-graduação (Stricto sensu, nível mestrado) - Incompleto'
    },
    {
      id : 10,
      level : 'Pós-graduação (Stricto sensu, nível mestrado) - Completo'
    },
    {
      id : 11,
      level : 'Pós-graduação (Stricto sensu, nível doutor) - Incompleto'
    },
    {
      id : 12,
      level : 'Pós-graduação (Stricto sensu, nível doutor) - Completo'
    }
  ]

  defineProps({
    errors : ''
  })
  let showDataAndScheduleSended = false;

  const data = {
    name : '',
    email : '',
    phone : null,
    desired_job: '',
    schooling : null,
    observations : '',
    document : '',
  }

  function listeningFile(event){
    file = event.target.files[0];
    data.document = file;
  }

  function sendForm() {
    $.post("/",
    data,
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  }

</script>

<style lang="scss">

  html{ 
    background-color: #E8D4D1 
  }
  #app{
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>