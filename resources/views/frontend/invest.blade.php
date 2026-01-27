@extends('frontend.layouts.app')

@section('title', 'Invest')

@section('content')

<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">How much profits would you want to earn</h2>
            <p class="text-muted">Try our NEW investment calculator</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm p-4">

                    {{-- INVESTMENT TYPE --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Choose Goat to invest in</label>
                        <select id="investment" class="form-select">
                            <option value="2000000" data-roi="30">Goat Investment</option>
                            <option value="5000000" data-roi="35">Premium Goat Investment</option>
                            <option value="8000000" data-roi="40">Elite Goat Investment</option>
                        </select>
                    </div>

                    {{-- NUMBER OF GOATS --}}
                    <div class="mb-3">
                        <label class="form-label">How many goats would you like to start with?</label>
                        <input type="number" id="goats" class="form-control" value="0" min="0">
                    </div>

                    {{-- YEARS --}}
                    <div class="mb-4">
                        <label class="form-label">For how many years will you invest?</label>
                        <input type="number" id="years" class="form-control" value="0" min="0">
                    </div>

                    <hr>

                    <h5 class="fw-bold mb-3">RETURNS (What I get back)</h5>

                    <div class="row mb-2">
                        <div class="col-6">Investment per Goat</div>
                        <div class="col-6 text-end fw-bold" id="price">TSH 2,000,000</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-6">Number of Goats</div>
                        <div class="col-6 text-end" id="totalGoats">0</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-6">Total Years</div>
                        <div class="col-6 text-end" id="totalYears">0</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-6">Rate of Return</div>
                        <div class="col-6 text-end" id="roi">30%</div>
                    </div>

                    <hr>

                    <div class="row mb-2">
                        <div class="col-6 fw-bold">Total Investment</div>
                        <div class="col-6 text-end fw-bold" id="totalInvestment">TSH 0</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-6 fw-bold text-success">Total Return</div>
                        <div class="col-6 text-end fw-bold text-success" id="totalReturn">TSH 0</div>
                    </div>

                    <hr>

                    <h6 class="fw-bold mb-3">Investment breakdown per year</h6>

                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Year</th>
                                    <th>Number of Goats</th>
                                    <th>ROI</th>
                                    <th>Profit</th>
                                    <th>Investment Value</th>
                                </tr>
                            </thead>
                            <tbody id="breakdown">
                                <tr>
                                    <td colspan="5">Enter values to calculate</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-4">
                        <p class="mb-2 fw-semibold">Invest in less than five minutes.</p>
                        <p class="text-muted">
                            Our platform enables you to choose your investment and calculate expected returns easily.
                        </p>

                        <a href="#" class="btn btn-success btn-lg px-5">
                            Start Investing
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

<script>
function format(num) {
    return "TSH " + num.toLocaleString();
}

function calculate() {
    let investment = document.getElementById("investment");
    let price = parseInt(investment.value);
    let roi = parseInt(investment.options[investment.selectedIndex].dataset.roi);

    let goats = parseInt(document.getElementById("goats").value) || 0;
    let years = parseInt(document.getElementById("years").value) || 0;

    let totalInvestment = price * goats;
    let yearlyProfit = totalInvestment * (roi / 100);
    let totalReturn = totalInvestment + (yearlyProfit * years);

    document.getElementById("price").innerText = format(price);
    document.getElementById("roi").innerText = roi + "%";
    document.getElementById("totalGoats").innerText = goats;
    document.getElementById("totalYears").innerText = years;
    document.getElementById("totalInvestment").innerText = format(totalInvestment);
    document.getElementById("totalReturn").innerText = format(totalReturn);

    let table = document.getElementById("breakdown");
    table.innerHTML = "";

    for (let i = 1; i <= years; i++) {
        table.innerHTML += `
            <tr>
                <td>${i}</td>
                <td>${goats}</td>
                <td>${roi}%</td>
                <td>${format(yearlyProfit)}</td>
                <td>${format(totalInvestment + yearlyProfit * i)}</td>
            </tr>
        `;
    }

    if (years === 0) {
        table.innerHTML = `<tr><td colspan="5">Enter values to calculate</td></tr>`;
    }
}

document.getElementById("investment").addEventListener("change", calculate);
document.getElementById("goats").addEventListener("input", calculate);
document.getElementById("years").addEventListener("input", calculate);
</script>

@endsection
