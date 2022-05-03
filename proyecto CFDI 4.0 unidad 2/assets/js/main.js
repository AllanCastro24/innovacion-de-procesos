var app = new Vue({
  el: '#app',
  data: {
    cfdis: [],
    errores: [],
  },
  mounted: function() {
    this.$refs.drop.addEventListener('dragover', this.handleDragOver, false);
    this.$refs.drop.addEventListener('drop', this.handleFileSelect, false);
  },
  computed: {
    total_suma: function() {
      var total = 0;
      for (var i = this.cfdis.length - 1; i >= 0; i--) {
        total += this.total(this.cfdis[i]);
      }
      return total;
    },
    cantidad: function() {
      return this.cfdis.length;
    },
    total_ingresos: function() {
      var total = 0;
      for (var i = this.cfdis.length - 1; i >= 0; i--) {
        return 0;
      }
      return 0;
    },
    total_egresos: function() {
      return 0;
    },
    total_traslados: function() {
      return 0;
    },
    total_nomina: function() {
      return 0;
    },
    total_pago: function() {
      return 0;
    },
  },
  methods: {
    handleDragOver: function(evt) {
      evt.stopPropagation();
      evt.preventDefault();
      evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
    },
    handleFileSelect: function(evt) {
      evt.stopPropagation();
      evt.preventDefault();
      var files = evt.dataTransfer.files; // FileList object.
      for (var i = 0, f; (f = files[i]); i++) {
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = cargarXML(f);
        // Read in the image file as a data URL.
        reader.readAsText(f);
      }
    },
    total_gravado: function(item) {
      //Obtener importes gravados de conceptos
      var suma = 0;
      for (var i = item.conceptos.length - 1; i >= 0; i--) {
        suma += item.conceptos[i].importe;
      }
      return suma;
    },
    total: function(item){
      //Obtener totales de conceptos
      var suma = 0;
      var total = 0;
      for (var i = item.conceptos.length - 1; i >= 0; i--) {
        suma += item.conceptos[i].importe;
      }
      total = suma;
      return total;
    },
    agregar: function(item) {
      //borrar si es que estuviera duplicado
      var arr = this.cfdis.filter(function(el) {
        return el.archivo != item.archivo;
      });
      arr.push(item);
      this.cfdis = arr;
      console.log('cfdis:');
      console.log(arr);
    },
  },
});
