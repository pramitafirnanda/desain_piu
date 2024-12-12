<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 id="createModal" class="semi-bold">User</h4>
            <br>
        </div>
        <div class="modal-body">
            <div class="row form-group">
                <div class="col-md-3">
                    <label>Kode User</label>
                </div>
                <div class="col-md-9">
                    @if(isset($user))
                        <input name="kduser" type="text" class="form-control" value="{{ $user ? $user->kduser : '' }}" required>
                    @else
                        <input name="kduser" type="text" class="form-control" required>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-3">
                    <label>Nama User</label>
                </div>
                <div class="col-md-9">
                    @if(isset($user))
                        <input name="nmuser" type="text" class="form-control" value="{{ $user ? $user->nmuser : '' }}" required>
                    @else
                        <input name="nmuser" type="text" class="form-control" required>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label>Initial</label>
                </div>
                <div class="col-md-9">
                    @if(isset($user))
                        <input name="initial" type="text" class="form-control" value="{{ $user ? $user->initial : '' }}" required>
                    @else
                        <input name="initial" type="text" class="form-control" required>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label>Password</label>
                </div>
                <div class="col-md-9">
                    @if(isset($user))
                        <input name="pwd" type="text" class="form-control">
                    @else
                        <input name="pwd" type="text" class="form-control" required>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label>Level</label>
                </div>
                <div class="col-md-9">
                    <select name="kdlevel" class="form-select form-control">
                        <option value="null"> -- pilih level -- </option>
                    @foreach($levels as $level)
                        <option value="{{$level->kdlevel}}">{{$level->nmlevel}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
