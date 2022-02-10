
<template>
    <div>
        <header>
            <Header/>
        </header>
        <main>
            <router-view></router-view>
        </main>

    </div>
   
</template>

<script>
import Header from '../components/Header';

export default {
    name: 'App',
    components: {
        Header,
    },

}

</script>

<style lang="scss" >



</style>