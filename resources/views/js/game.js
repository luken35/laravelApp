function ready(f) {
    /in/.test(document.readyState) ? setTimeout('ready(' + f + ')', 9) : f();
}

ready(function() {

    const app = Vue.createApp({
        data(){
            return{
                playerHealth: 100,
                monsterHealth: 100,
                playerLevel:  1,
                attackValue: null,
                attackPower: null,
                maxPower: null,
                counter: null,
                maxHeal: null,
                healBase: null,
                logMessages: [],
                currentRound: null,
                winner: null,
            };
        },
        watch:{
            playerHealth(value){
                if(value <= 0){
                    this.winner = 'Monster';
                }
            },
            monsterHealth(value){
                if(value <= 0){
                    this.winner = 'Player';
                }
            },
        },
        methods:{
            setAttackValue(maxPower, attackPower){
                this.attackValue = Math.floor(Math.random() * (maxPower - attackPower)) + attackPower;
            },
            setHealValue(maxHeal, healBase){
                this.healValue = Math.floor(Math.random() * (maxHeal - healBase)) + healBase;
            },
            attackMonster(){
                this.currentRound += 1;
                this.attackPower = this.playerLevel + 5;
                this.maxPower = this.attackPower * 2.3;

                this.setAttackValue(this.maxPower, this.attackPower);

                this.monsterHealth -= this.attackValue;
                this.addLogMessage('Player', 'Attacks And Deals', this.attackValue, this.currentRound);

                if(this.monsterHealth <= 0 ){
                    this.monsterHealth = 0;
                }else{
                    this.attackPlayer();
                }
            },
            attackPlayer(){
                this.attackPower = 5;
                this.maxPower = 18;

                this.setAttackValue(this.maxPower, this.attackPower);

                const chance = Math.random();
                if(chance < 0.1){
                    this.attackValue = Math.floor(this.attackValue * 1.5);
                    this.playerHealth -= this.attackValue; // block failed double damage
                    this.addLogMessage('Monster', 'Critical Strikes And Deals', this.attackValue, this.currentRound);
                }else{
                    this.playerHealth -= this.attackValue;
                    this.addLogMessage('Monster', 'Cleaves And Deals', this.attackValue, this.currentRound);
                }

                if(this.playerHealth <= 0 ){
                    this.playerHealth = 0;
                }
                if(this.playerHealth >= 100){
                    this.playerHealth = 100;
                }
            },
            heavyAttack(){
                this.currentRound += 1;
                this.attackPower = this.playerLevel + 15;
                this.maxPower = this.attackPower * 2;

                this.setAttackValue(this.maxPower, this.attackPower);

                this.monsterHealth -= this.attackValue;
                this.addLogMessage('Player', 'Heavy Attacks And Deals', this.attackValue, this.currentRound);
                if(this.monsterHealth <= 0 ){
                    this.monsterHealth = 0;
                }else{
                    this.attackPlayer();
                }
            },
            block(){
                this.currentRound += 1;
                this.healBase = (this.playerLevel * 2) + 6;
                this.maxHeal = (this.playerLevel * 2) + 12;

                this.setHealValue(this.maxHeal, this.healBase);
                this.setAttackValue(25, 5);

                this.playerHealth += this.healValue;
                this.addLogMessage('Player', 'Shields And Recovers', this.healValue, this.currentRound);

                const chance = Math.random();
                if(chance < 0.2){
                    this.attackValue = Math.floor(this.attackValue * 2);
                    this.playerHealth -= this.attackValue; // block failed double damage

                    this.addLogMessage('Player', 'Attempts To Block But Fails And Takes', this.attackValue, this.currentRound);
                }else{
                    this.attackValue = Math.floor(this.attackValue / 2);
                    this.playerHealth -= this.attackValue; // block successful

                    this.addLogMessage('Player', 'Blocks Successfully And Only Takes', this.attackValue, this.currentRound);
                }
                if(this.playerHealth <= 0 ){
                    this.playerHealth = 0;
                }else if(this.playerHealth >= 100){
                    this.playerHealth = 100;
                }
            },
            heal(){
                this.currentRound += 1;
                this.healBase = 15;
                this.maxHeal = this.healBase * 2;

                this.setHealValue(this.maxHeal, this.healBase);
                this.playerHealth += this.healValue;

                this.addLogMessage('Player', 'Recovers', this.healValue, this.currentRound);
                this.attackPlayer();

            },
            addLogMessage(who, what, value, round){
                this.logMessages.unshift({
                    actionBy: who,
                    actionType: what,
                    actionValue: value,
                    actionRound: round,
                });
            }
        },
    });
    app.mount('#game');

});
