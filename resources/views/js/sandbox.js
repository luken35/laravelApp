

function ready(f) {
    /in/.test(document.readyState) ? setTimeout('ready(' + f + ')', 9) : f();
}

ready(function() {

    const app = Vue.createApp({
        data(){
            return{
                name: "Luke",
                age : 5,
                add : 5,
                rnd : Math.random()
            };
        },
        computed: {
            ageadd() {
                return parseInt(this.age) + parseInt(this.add);
            }
        }
    });
    app.mount('#assignment');

    const countapp = Vue.createApp({
        data(){
            return{
                counter: 0
            };
        },
        methods: {
            add(num){
                this.counter = this.counter + num;
            },
            minus(){
                if(this.counter === 0){
                    alert("cant go lower");
                }else{
                    this.counter = this.counter - 1;
                }
            }
        }
    });
    countapp.mount('#counterApp');

    const app2 = Vue.createApp({
        data(){
            return{
                name: ''
            };
        },
        computed: {
            fullname(){
                if(this.name === ''){
                    return '';
                }
                return this.name + ' ' + 'Nic';

            },
        },
        methods: {
            resetInput(){
                this.name = '';
            }
        }
    });

    app2.mount('#inputApp');

    const app3 = Vue.createApp({
        data(){
            return{
                input1: '',
                input2: '',
            };
        },
        methods: {
            setInput(event){
                this.input1 = event.target.value;
            },
            confirmInput(event){
                this.input2 = event.target.value;
            }

        }
    });
    app3.mount('#assignment2');

    const app5 = Vue.createApp({
        data(){
            return{
              boxA: false,
              boxB: false,
              boxC: false,
              result: '',
            };
        },
        methods:{
            boxS(box){
               if(box === 'A'){
                   this.boxA = !this.boxA;
               }else if(box === 'B'){
                    this.boxB = !this.boxB; // this is essentially a toggle between true and false
                }
            }
        }
    });
    app5.mount('#app2');

    const app6 = Vue.createApp({
            data(){
                return{
                    goalvalue: '',
                    goals: [],
                };
            },
        methods: {
              addGoal(){
                this.goals.push(this.goalvalue);
              }
        }
    });

    app6.mount('#goals');
});


