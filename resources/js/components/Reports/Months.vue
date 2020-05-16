

<script>

import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,
  mounted () {
    this.renderChart({
            labels:['jan','fev','mar','abri'],
            dataset:[
                {
               label:'Relatório de vendas ',
               data: [ 3,4,8,4],
                }

                ]
        })
    }
    
}
</script>