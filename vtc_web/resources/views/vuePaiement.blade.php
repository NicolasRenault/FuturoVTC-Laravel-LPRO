<!DOCTYPE html>

    <form action="/confirmation" method="post"> 
    @csrf
    <div>
            <label>N° carte : </label>
            <input type="text" id="cardNumber" name="cardNumber" />
            @error('cardNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>Date d'expiration :</label>
            <input type="date" id="expirationDate" name="expirationDate" />
            @error('expirationDate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div>
            <label>Titulaire : </label>
            <input type="text" id="owner" name="owner" />
            @error('owner')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
       
            <label>CVV :</label>
            <input type="number" id="cvv" name="cvv" />
            @error('cvv')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

    <div>
            <input type="submit" value="Valider" id="validateButton" name="validateButton"/>
    <div>

    </form>

 