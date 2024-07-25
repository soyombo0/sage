<html>
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form action="leads" method="POST">
                @csrf
                <div class="formbold-input-flex">
                    <div>
                        <input
                            type="text"
                            name="price"
                            id="price"
                            placeholder="1000"
                            class="formbold-form-input"
                        />
                        <label for="price" class="formbold-form-label"> Price </label>
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Jane"
                            class="formbold-form-input"
                        />
                        <label for="name" class="formbold-form-label"> Name </label>
                    </div>
                    <div>
                        <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="jhon@mail.com"
                        class="formbold-form-input"
                        />
                        <label for="email" class="formbold-form-label"> Mail </label>
                    </div>
                    <div>
                        <input
                        type="text"
                        name="phone"
                        id="phone"
                        placeholder="(319) 555-0115"
                        class="formbold-form-input"
                        />
                        <label for="phone" class="formbold-form-label"> Phone </label>
                    </div>
                    <input
                        type="hidden"
                        name="spent_30_sec"
                        id="spent_30_sec"
                    />
                </div>

                <button class="formbold-btn">
                    Create Deal
                </button>
            </form>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $('#spent_30_sec').val("0")
    let x = setInterval(function() {
        $('#spent_30_sec').val("1")
    }, 30000);
</script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: "Inter", sans-serif;
  }
  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 550px;
    width: 100%;
    background: white;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 22px;
  }
  .formbold-input-flex > div {
    width: 50%;
    display: flex;
    flex-direction: column-reverse;
  }
  .formbold-textarea {
    display: flex;
    flex-direction: column-reverse;
  }

  .formbold-form-input {
    width: 100%;
    padding-bottom: 10px;
    border: none;
    border-bottom: 1px solid #DDE3EC;
    background: #FFFFFF;
    font-weight: 500;
    font-size: 16px;
    color: #07074D;
    outline: none;
    resize: none;
  }
  .formbold-form-input::placeholder {
    color: #536387;
  }
  .formbold-form-input:focus {
    border-color: #6A64F1;
  }
  .formbold-form-label {
    color: #07074D;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 18px;
  }
  .formbold-form-input:focus + .formbold-form-label {
    color: #6A64F1;
  }

  .formbold-input-file {
    margin-top: 30px;
  }
  .formbold-input-file input[type="file"] {
    position: absolute;
    top: 6px;
    left: 0;
    z-index: -1;
  }
  .formbold-input-file .formbold-input-label {
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
  }

  .formbold-filename-wrapper {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 22px;
  }
  .formbold-filename {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 14px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-filename svg {
    cursor: pointer;
  }

  .formbold-btn {
    font-size: 16px;
    border-radius: 5px;
    padding: 12px 25px;
    border: none;
    font-weight: 500;
    background-color: #6A64F1;
    color: white;
    cursor: pointer;
    margin-top: 25px;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

</style>
</html>
