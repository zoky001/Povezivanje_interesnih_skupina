

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body>

<form ng-app="" name="myForm" ng-init="myText = 'post@myweb.com'">

Email:
<input type="email" name="myAddress" ng-model="myText" required>
<p>Edit the e-mail address, and try to change the status.</p>
<h1>Status</h1>
<p>Valid: {{myForm.myAddress.$valid}} (if true, the value meets all criteria).</p>
<p>Dirty: {{myForm.myAddress.$dirty}} (if true, the value has been changed).</p>
<p>Touched: {{myForm.myAddress.$touched}} (if true, the field has been in focus).</p>

</form>

</body>
</html>
