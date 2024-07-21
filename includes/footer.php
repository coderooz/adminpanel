		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; Project Management 2020</span>
				</div>
			</div>
		</footer>
	</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a> 
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sure to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select <b>"Logout"</b> below if you are <strong>Ready to leave</strong>.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" onclick="logout()">Logout</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="terminalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sure to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<textarea class="form-control bg-gradient-dark text-gray-500" col="5"> >> </textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="button">Run</button>
						<button class="btn btn-primary" type="reset">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>