<?php
$page_title = "Timestamp Converter - Unix Timestamp to Date Online";
$page_description = "Free online timestamp converter. Convert Unix timestamps to human-readable dates and vice versa. Fast, accurate, and easy to use.";
$page_keywords = "timestamp converter, unix timestamp, date converter, developer tools, epoch converter";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 900px; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); border-radius: 28px; padding: 30px; box-shadow: 0 30px 60px -20px rgba(0,30,40,0.3);">
                <h1 class="text-center mb-4"><i class="fas fa-clock" style="color: #1f7a7a;"></i> Timestamp Converter</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label><i class="fas fa-calendar"></i> Date & Time</label>
                            <input type="datetime-local" id="dateInput" class="form-control" style="font-family: 'SF Mono', monospace; background: rgba(255,255,255,0.5); border: 1px solid rgba(200,215,225,0.3); border-radius: 12px; padding: 12px;">
                        </div>
                        <div class="toolbar" style="display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap;">
                            <button class="btn btn-primary" onclick="toTimestamp()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1b6f7a; color: white;"><i class="fas fa-arrow-right"></i> To Timestamp</button>
                            <button class="btn btn-secondary" onclick="setNow()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e;"><i class="fas fa-clock"></i> Now</button>
                        </div>
                        <div id="timestampResult" class="result-box" style="background: rgba(255,255,255,0.5); border-radius: 12px; padding: 15px; min-height: 80px; border: 1px solid rgba(200,215,225,0.3); font-family: 'SF Mono', monospace; font-size: 14px; display: flex; align-items: center;">
                            <span class="label" style="font-weight: 600; color: #3c6b7a; margin-right: 10px;">Timestamp:</span>
                            <span id="timestampValue">Click "To Timestamp"</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label><i class="fas fa-hashtag"></i> Timestamp (Seconds)</label>
                            <input type="number" id="timestampInput" placeholder="Enter timestamp (e.g., 1614556800)" class="form-control" style="font-family: 'SF Mono', monospace; background: rgba(255,255,255,0.5); border: 1px solid rgba(200,215,225,0.3); border-radius: 12px; padding: 12px;">
                        </div>
                        <div class="toolbar" style="display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap;">
                            <button class="btn btn-primary" onclick="toDate()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1b6f7a; color: white;"><i class="fas fa-arrow-right"></i> To Date</button>
                            <button class="btn btn-secondary" onclick="getCurrentTimestamp()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e;"><i class="fas fa-clock"></i> Current</button>
                        </div>
                        <div id="dateResult" class="result-box" style="background: rgba(255,255,255,0.5); border-radius: 12px; padding: 15px; min-height: 80px; border: 1px solid rgba(200,215,225,0.3); font-family: 'SF Mono', monospace; font-size: 14px; display: flex; align-items: center;">
                            <span class="label" style="font-weight: 600; color: #3c6b7a; margin-right: 10px;">Date:</span>
                            <span id="dateValue">Click "To Date"</span>
                        </div>
                    </div>
                </div>
                <div class="toolbar text-center" style="margin-top: 20px; border-top: 1px solid rgba(200,215,225,0.3); padding-top: 20px;">
                    <button class="btn btn-secondary" onclick="copyTimestamp()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e; margin: 5px;"><i class="fas fa-copy"></i> Copy Timestamp</button>
                    <button class="btn btn-secondary" onclick="copyDate()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e; margin: 5px;"><i class="fas fa-copy"></i> Copy Date</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toTimestamp() {
        const dateInput = document.getElementById('dateInput').value;
        if (!dateInput) {
            document.getElementById('timestampValue').textContent = 'Please select a date';
            return;
        }
        const date = new Date(dateInput);
        const timestamp = Math.floor(date.getTime() / 1000);
        document.getElementById('timestampValue').textContent = timestamp;
    }
    
    function toDate() {
        const input = document.getElementById('timestampInput').value;
        if (!input) {
            document.getElementById('dateValue').textContent = 'Please enter a timestamp';
            return;
        }
        const timestamp = parseInt(input);
        if (isNaN(timestamp)) {
            document.getElementById('dateValue').textContent = 'Invalid timestamp';
            return;
        }
        const date = new Date(timestamp * 1000);
        document.getElementById('dateValue').textContent = date.toLocaleString('en-US', {
            year: 'numeric', month: '2-digit', day: '2-digit',
            hour: '2-digit', minute: '2-digit', second: '2-digit',
            hour12: false
        });
    }
    
    function setNow() {
        const now = new Date();
        const iso = now.toISOString().slice(0, 16);
        document.getElementById('dateInput').value = iso;
        toTimestamp();
    }
    
    function getCurrentTimestamp() {
        const now = Math.floor(Date.now() / 1000);
        document.getElementById('timestampInput').value = now;
        toDate();
    }
    
    function copyTimestamp() {
        const value = document.getElementById('timestampValue').textContent;
        if (value && value !== 'Click "To Timestamp"' && value !== 'Please select a date') {
            navigator.clipboard.writeText(value).then(() => {
                alert('Timestamp copied!');
            });
        }
    }
    
    function copyDate() {
        const value = document.getElementById('dateValue').textContent;
        if (value && value !== 'Click "To Date"' && value !== 'Please enter a timestamp' && value !== 'Invalid timestamp') {
            navigator.clipboard.writeText(value).then(() => {
                alert('Date copied!');
            });
        }
    }
    
    // Auto-convert on input change
    document.getElementById('dateInput').addEventListener('change', toTimestamp);
    document.getElementById('timestampInput').addEventListener('change', toDate);
    
    // Set current time on load
    setNow();
    getCurrentTimestamp();
</script>

<?php include '../../includes/toolsfooter.php'; ?>