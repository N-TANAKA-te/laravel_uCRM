<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const newTitle = ref('');
const newContent= ref('');
</script>

<template>
    Inertiaテストです。<br>
    <a href="/">aタグの経由です。</a><br>
    <Link href="/">Link経由です。</Link><br>
    <Link :href="route('inertia.index')">名前付きルートの確認です。</Link><br>
    <!-- 名前付きルートを使用してリンク先にidも一緒に送る -->
    <Link :href="route('inertia.show', { id: 1 })">ルートパラメータのテストです。</Link> 
    
    <div class="mb-8">
    <input type="text" name="newTitle" v-model="newTitle">{{ newTitle }}<br>
    <input type="text" name="newContent" v-model="newContent">{{ newContent }}<br>
    <Link as="button" method="post" :href="route('inertia.store')" :data="{title: newTitle, content: newContent}">保存テスト</Link>
    </div>
</template>