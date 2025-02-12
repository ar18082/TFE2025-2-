<div class="col-12" style="margin: 0 0 1rem 0">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-6">
                    <label for="refAppTR" style="color: grey">RefAppTR : </label>
                    <select class="form-control refAppTR" name="refAppTR" id="refAppTR" >
                    </select>
                </div>
                <div class="col-6">
                    <label for="refAppCli" style="color: grey">RefAppCli : </label>
                    <select class="form-control refAppCli" name="refAppCli" id="refAppCli">
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <label for="dateRlv" style="color: grey">Date du relevé :</label>
            <select class="form-control " name="dateRlv" id="dateRlv" size="3" aria-label="size 3">
            </select>
        </div>
        <div class="col-4">
            <label for="createDate"  style="color: grey">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="checkboxDateImmeuble" >
                    <label class="form-check-label" for="flexSwitchCheckChecked">immeuble</label>
                </div>
                Date de création:
            </label>
            <input type="date" class="form-control" id="createDate" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
        </div>

    </div>
</div>
<hr/>


