<template>
<div class="content-wrapper notfound">
    <div>
        <h1>404</h1>
        <p>Oops! Something is wrong.</p>
        <router-link to="/">
            <i class="icon-home"></i>Go back to home.
        </router-link>
    </div>
</div>
</template>

<script>
export default {}
</script>

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,500);

.notfound {
    font-family: "Roboto", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background: wheat;
}

.notfound h1,
.notfound p,
.notfound a {
    display: block;
    text-align: center;
    margin: 20px 0;
}

.notfound h1 {
    color: white;
    font-size: 80px;
    text-shadow: black 1px 1px, black 2px 2px, black 3px 3px,
        black 4px 4px, black 5px 5px, black 6px 6px, black 7px 7px,
        black 8px 8px, black 9px 9px, black 10px 10px;
}

.notfound a {
    color: #054f9f;
}
</style>
