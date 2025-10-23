<style>
 header {
    text-align: center;
    padding: 40px 20px 20px;
    color: #000; /* changed from #fff to black */
    text-shadow: 0 2px 6px rgba(0,0,0,0.2); /* optional, you can remove if not needed */
}
header h1 {
    margin: 0;
    font-size: 2rem;
}
header p {
    margin: 6px 0 0;
    font-size: 0.95rem;
}

.recipe-calorie-calculator {
  font-family: 'Inter', sans-serif;
  margin: 20px 0;
}
.recipe-calorie-calculator .calculator-card {
  background: #ffe7cd;
  border-radius: 18px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  padding: 24px;
  margin-bottom: 24px;
  transition: 0.3s;
}
.recipe-calorie-calculator .calculator-card:hover { transform: translateY(-3px); }
.recipe-calorie-calculator label { display: block; font-weight: 600; margin-bottom: 5px; }
.recipe-calorie-calculator input, .recipe-calorie-calculator select {
  width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 10px; font-size: 0.95rem;
  transition: 0.2s;
}
.recipe-calorie-calculator input:focus, .recipe-calorie-calculator select:focus {
  border-color: #ff7e5f; outline: none; box-shadow: 0 0 0 3px rgba(255,126,95,0.2);
}
.recipe-calorie-calculator button {
  border: none; border-radius: 10px; cursor: pointer; padding: 10px 18px;
  font-weight: 600; font-size: 0.95rem; transition: 0.25s;
}
.recipe-calorie-calculator button.primary { background: linear-gradient(135deg, #ff7e5f, #feb47b); color: #fff; }
.recipe-calorie-calculator button.primary:hover { opacity: 0.9; }
.recipe-calorie-calculator button.secondary { background: #f0f0f0; color: #333; }
.recipe-calorie-calculator .row { display: flex; flex-wrap: wrap; gap: 12px; }
.recipe-calorie-calculator .row > div { flex: 1; min-width: 180px; }
.recipe-calorie-calculator .ingredient-list { margin-top: 16px; }
.recipe-calorie-calculator .ingredient-item {
  background: #fff8f6; border: 1px solid #ffe0d5; padding: 10px 14px; border-radius: 12px;
  margin-bottom: 10px; display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
}
.recipe-calorie-calculator .ingredient-item strong { color: #ff7e5f; }
.recipe-calorie-calculator .ingredient-item button {
  background: #ffb4a2; color: #fff; border: none; padding: 6px 10px;
}
.recipe-calorie-calculator .ingredient-item button:hover { background: #ff8b6b; }
.recipe-calorie-calculator .stats-grid {
  display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 12px; margin-top: 16px;
}
.recipe-calorie-calculator .stat { background: #fff8f6; border-radius: 12px; padding: 12px; text-align: center; }
.recipe-calorie-calculator .stat h2 { margin: 0; color: #ff7e5f; font-size: 1.4rem; }
.recipe-calorie-calculator .stat small { display: block; color: #666; }
.recipe-calorie-calculator table { width: 100%; border-collapse: collapse; margin-top: 10px; }
.recipe-calorie-calculator th, .recipe-calorie-calculator td { padding: 8px; border-bottom: 1px solid #eee; font-size: 0.9rem; }
.recipe-calorie-calculator th { background: #fff5f0; color: #333; }



.recipe-calorie-calculator table {
	width: 100%;
	border-collapse: collapse;
	margin-top: 10px;
	table-layout: fixed;
	/* ensures columns stay aligned */
}

.recipe-calorie-calculator th,
.recipe-calorie-calculator td {
	padding: 10px 12px;
	font-size: 0.95rem;
	border-bottom: 1px solid #eee;
}

.recipe-calorie-calculator th {
	background: #fff5f0;
	color: #333;
	font-weight: 600;
}

.recipe-calorie-calculator th:first-child,
.recipe-calorie-calculator td:first-child {
	text-align: left;
	/* ingredient name left-aligned */
}

.recipe-calorie-calculator th:nth-child(n+2),
.recipe-calorie-calculator td:nth-child(n+2) {
	text-align: right;
	/* numbers right-aligned */
}

	/* optional striped rows for clarity */
/*.recipe-calorie-calculator tbody tr:nth-child(odd) {*/
/*	background: #fff8f6;*/
/*}*/

</style>


<div class="recipe-calorie-calculator">
    
  <div class="calculator-card">
      <header>
    <h1>🍲 Recipe Calorie Calculator</h1>
    <p>Colorful, friendly & accurate — calculate your recipe’s nutrition per serving!</p>
  </header>
    <div class="row">
      <div>
        <label>Ingredient Name</label>
        <input class="ing-name" list="ing-suggestions" type="text" placeholder="e.g. rice, milk, butter" />
        <datalist id="ing-suggestions">
          <option>sugar</option>
          <option>flour</option>
          <option>butter</option>
          <option>milk</option>
          <option>egg</option>
          <option>olive oil</option>
        </datalist>
      </div>
      <div>
        <label>Amount</label>
        <input class="ing-amount" type="number" placeholder="e.g. 100" />
      </div>
      <div>
        <label>Unit</label>
        <select class="ing-unit">
          <option value="g">grams</option>
          <option value="cup">cups</option>
          <option value="tbsp">tablespoons</option>
          <option value="tsp">teaspoons</option>
          <option value="oz">ounces</option>
          <option value="ml">ml</option>
          <option value="piece">pieces</option>
        </select>
      </div>
      <div>
        <label>Calories per 100g (optional)</label>
        <input class="ing-cals100" type="number" placeholder="Leave blank for default" />
      </div>
    </div>
    <div style="margin-top:12px;text-align:right;">
      <button class="primary add-ing">+ Add Ingredient</button>
    </div>
    <div class="ingredient-list"></div>
    <div class="row" style="align-items:flex-end;margin-top:16px;">
      <div style="max-width:200px;">
        <label>Servings</label>
        <input class="servings" type="number" value="1" min="1" />
      </div>
      <div style="margin-left:auto;">
        <button class="primary calculate">Calculate</button>
        <button class="secondary clear">Clear</button>
      </div>
    </div>
  </div>

  <div class="calculator-card">
    <h2 style="margin-top:0;color:#ff7e5f;"><strong>Nutrition Summary</strong></h2>
    <div class="stats-grid">
      <div class="stat"><h2 class="cal-serving">0</h2><small>Calories</small></div>
      <div class="stat"><h2 class="prot-serving">0</h2><small>Protein (g)</small></div>
      <div class="stat"><h2 class="carb-serving">0</h2><small>Carbs (g)</small></div>
      <div class="stat"><h2 class="fat-serving">0</h2><small>Fat (g)</small></div>
    </div>
    <h3 style="margin-top:20px;">Ingredient Breakdown</h3>
    <table class="breakdown">
      <thead><tr><th>Ingredient</th><th>Amount</th><th>Total Cal</th><th>Per Serving</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</div>



<script>
(function(wrapper){
  const NUTR_DB = {
    sugar: {cal:387, prot:0, carb:100, fat:0, cup_grams:200},
    flour: {cal:364, prot:10, carb:76, fat:1, cup_grams:120},
    butter: {cal:717, prot:1, carb:0, fat:81, cup_grams:227},
    milk: {cal:42, prot:3.4, carb:5, fat:1, cup_grams:240},
    egg: {cal:155, prot:13, carb:1.1, fat:11, piece_grams:50},
    'olive oil': {cal:884, prot:0, carb:0, fat:100, cup_grams:218}
  };
  const UNIT_TO_GRAMS = {
    g:(a)=>a, cup:(a,n)=> (NUTR_DB[n]?.cup_grams||240)*a,
    tbsp:(a)=>a*14.8, tsp:(a)=>a*4.9, oz:(a)=>a*28.3, ml:(a)=>a, piece:(a,n)=> (NUTR_DB[n]?.piece_grams||50)*a
  };
  let ingredients=[];

  const ingName = wrapper.querySelector('.ing-name');
  const ingAmount = wrapper.querySelector('.ing-amount');
  const ingUnit = wrapper.querySelector('.ing-unit');
  const ingCals100 = wrapper.querySelector('.ing-cals100');
  const addBtn = wrapper.querySelector('.add-ing');
  const calculateBtn = wrapper.querySelector('.calculate');
  const clearBtn = wrapper.querySelector('.clear');
  const ingredientList = wrapper.querySelector('.ingredient-list');
  const servingsInput = wrapper.querySelector('.servings');
  const calServing = wrapper.querySelector('.cal-serving');
  const protServing = wrapper.querySelector('.prot-serving');
  const carbServing = wrapper.querySelector('.carb-serving');
  const fatServing = wrapper.querySelector('.fat-serving');
  const breakdownTbody = wrapper.querySelector('.breakdown tbody');

  function renderList(){
    ingredientList.innerHTML='';
    ingredients.forEach((ing,i)=>{
      const el=document.createElement('div');
      el.className='ingredient-item';
      el.innerHTML=`<strong>${ing.name}</strong> - ${ing.amount} ${ing.unit} (~${ing.grams.toFixed(0)}g)
        <span style="margin-left:auto;">${ing.totalCals.toFixed(0)} cal</span>
        <button data-i="${i}">✕</button>`;
      el.querySelector('button').onclick=()=>{ingredients.splice(i,1);renderList();};
      ingredientList.appendChild(el);
    });
  }

  addBtn.onclick=()=>{
    const name=ingName.value.trim().toLowerCase();
    const amount=parseFloat(ingAmount.value)||0;
    const unit=ingUnit.value;
    const custom=parseFloat(ingCals100.value)||null;
    if(!name||amount<=0)return alert('Enter valid ingredient & amount');
    const grams=(UNIT_TO_GRAMS[unit]||((a)=>a))(amount,name);
    const cal100=custom||NUTR_DB[name]?.cal||200;
    const totalCals=grams*cal100/100;
    ingredients.push({name,amount,unit,grams,totalCals});
    renderList();
    ingName.value=''; ingAmount.value=''; ingCals100.value='';
  };

  calculateBtn.onclick=()=>{
    const servings=Math.max(1,parseFloat(servingsInput.value)||1);
    if(!ingredients.length)return alert('Add some ingredients!');
    let total=0;
    ingredients.forEach(x=>total+=x.totalCals);
    const per=total/servings;
    calServing.textContent=per.toFixed(0);
    protServing.textContent=(per*0.1/4).toFixed(1);
    carbServing.textContent=(per*0.5/4).toFixed(1);
    fatServing.textContent=(per*0.4/9).toFixed(1);
    breakdownTbody.innerHTML='';
    ingredients.forEach(x=>{
      breakdownTbody.innerHTML+=`<tr><td>${x.name}</td><td>${x.amount} ${x.unit}</td><td>${x.totalCals.toFixed(0)}</td><td>${(x.totalCals/servings).toFixed(0)}</td></tr>`;
    });
  };

  clearBtn.onclick=()=>{
    ingredients=[]; renderList();
    breakdownTbody.innerHTML='';
    calServing.textContent='0';
    protServing.textContent='0';
    carbServing.textContent='0';
    fatServing.textContent='0';
  };
})(document.querySelector('.recipe-calorie-calculator'));
</script>
