<!DOCTYPE html>

    <form action="/paiement" method="post">
    @csrf
        <div>
            <label>Nom :</label>
            <input type="text" id="clientName" name="clientName" value=" {{ old('clientName') }} " />
            @if($errors->has('clientName'))
                <p>{{ $errors->first('clientName')}} </p>
            @endif

            <label>Prénom:</label>
            <input type="text" id="firstName" name="firstName" value=" {{ old('firstName') }} "/>
            @if($errors->has('firstName'))
                <p>{{ $errors->first('firstName')}} </p>
            @endif

            <label>N°telephone:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value=" {{ old('phoneNumber') }} " />
            @if($errors->has('phoneNumber'))
                <p>{{ $errors->first('phoneNumber')}} </p>
            @endif

            <input type="text" id="clientName" name="clientName" />

            <label>Prénom:</label>
            <input type="text" id="firstName" name="firstName" />

            <label>N°telephone:</label>
            <input type="number" id="phoneNumber" name="phoneNumber" />

        </div>

        <div>

            <label>Date départ :</label>
            <input type="date" id="date" name="date" value=" {{ old('date') }} " />
            @if($errors->has('date'))
                <p>{{ $errors->first('date')}} </p>
            @endif

            <label>Heure :</label>
            <input type="time" id="hour" name="hour" value=" {{ old('hour') }} " />
            @if($errors->has('hour'))
                <p>{{ $errors->first('hour')}} </p>
            @endif

            <label>Nombre de personnes :</label>
            <input type="number" id="nbPers" name="nbPers" min="1" max="82" value=" {{ old('nbPers') }} "/>
            @if($errors->has('nbPers'))
                <p>{{ $errors->first('nbPers')}} </p>
            @endif

        </div>

        <div>
            <label>Lieu de départ :</label>
            <input type="text" id="startLocation" name="startLocation" value=" {{ old('startLocation') }} " />
            @if($errors->has('startLocation'))
                <p>{{ $errors->first('startLocation')}} </p>
            @endif
            <label>Date :</label>
            <input type="date" id="date" name="date" />

            <label>Heure :</label>
            <input type="time" id="hour" name="hour" />

            <label>Nombre de personnes :</label>
            <input type="number" id="nbPers" name="nbPers" />
        </div>

        <div>
            <label>Lieu de départ :</label>
            <input type="text" id="startLocation" name="startLocation" />
            <label>Lieu d'arrivé :</label>
            <input type="text" id="endLocation" name="endLocation" value=" {{ old('endLocation') }} " />
            @if($errors->has('endLocation'))
                <p>{{ $errors->first('endLocation')}} </p>
            @endif


        </div>

        <div>
            <input type="submit" value="Valider" id="validateButton" name="validateButton"/>
        <div>

    </form>
