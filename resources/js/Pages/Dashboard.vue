<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";

const userData = ref({});

const submitData = async () => {
    const response = await axios.post('/data', userData.value);
} 

const fectchCookie = async () => {
    const response = await axios.get('/data')
    if(typeof response.data === 'object')
    {
      userData.value = response.data;
    }
    console.log(userData.value, 'afterget')
    console.log(response.data, 'afterget')
};

onMounted( async () => {
      await fectchCookie();
    });
    
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="columns-2 py-2">
              <label for="first_name" class="pr-2 inline-block w-40"
                >Имя</label>
              <input type="text" id="first_name" v-model="userData.first_name" />
            </div>
            <div class="columns-2 py-2">
              <label for="last_name" class="pr-2 inline-block w-40"
                >Фамилия</label
              >
              <input type="text" id="last_name" v-model="userData.last_name" />
            </div>
            <div class="columns-2 py-2">
              <label for="email" class="pr-2 inline-block w-40"
                >Почта</label>
              <input type="text" id="email" v-model="userData.email" />
            </div>
            <div class="columns-2 py-2">
              <label for="date" class="pr-2 inline-block w-40"
                >Выберите дату</label
              >
              <input type="date" id="date" v-model="userData.date" />
            </div>
            <div class="columns-2 py-2">
              <label for="document_type" class="pr-2 inline-block w-40"
                >Выбор</label
              >
              <select id="document_type" v-model="userData.document_type">
                <option value="доверенность">доверенность</option>
                <option value="наследство">наследство</option>
                <option value="справка">справка</option>
              </select>
            </div>
            <div>
                <button class="btn-primary" @click="submitData">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style>
.btn-primary {
    border: 1px solid gray;
    padding: 12px 18px;
    background-color: bisque;
}
.btn-primary:hover {
    background-color: rgb(221, 159, 83);
}
</style>